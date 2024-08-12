<?php

session_start();
require('../config/commendes.php');

if (!isset($_SESSION['adminSession'])) {
    header("Location: ../login.php");
    exit();
}

if (empty($_SESSION['adminSession'])) {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['pdt'])) {
    header("Location: ../admin/editer.php");
    exit();
}

if (empty($_GET['pdt']) || !is_numeric($_GET['pdt'])) {
    header("Location: ../admin/editer.php");
    exit();
}

$id = $_GET['pdt'];
$myProduits = getProduit($id);

// affichage des produits séléctionnées dans le attribut value de chaque input
foreach ($myProduits as $singleProduct) {
    $idPdt = $singleProduct->id;
    $nom = $singleProduct->nom;
    $image = $singleProduct->image;
    $prix = $singleProduct->prix;
    $description = $singleProduct->description;
}

// Action de modification des valeurs de chaque input
if (isset($_POST['productSubmit'])) {
    $productName = htmlspecialchars(strip_tags($_POST['productName']));
    $productPrice = htmlspecialchars(strip_tags($_POST['productPrice']));
    $productDescription = htmlspecialchars(strip_tags($_POST['productDescription']));

    // Gestion du fichier uploadé
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {
        $productImage = $_FILES['productImage'];
        $fileTmpPath = $productImage['tmp_name'];
        $fileName = $productImage['name'];
        $fileSize = $productImage['size'];
        $fileType = $productImage['type'];
        $fileNameCmps = explode('.', $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
        $maxFileSize = 4000000; // 4MB

        if (in_array($fileExtension, $allowedExtensions) && $fileSize <= $maxFileSize) {
            $newFileName = uniqid('', true) . '.' . $fileExtension;
            $uploadFileDir = './upload/';
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $productImagePath = $newFileName;
            } else {
                $errorMessage = 'Erreur lors du téléchargement de l\'image.';
            }
        } else {
            $errorMessage = 'Extension de fichier non autorisée ou taille trop grande.';
        }
    } else {
        // Si aucune image n'est uploadée, utiliser l'ancienne image
        $productImagePath = $image;
    }

    try {
        Modifier($productImagePath, $productName, $productPrice, $productDescription, $id);
        header("Location: editer.php");
        exit();
    } catch (Exception $e) {
        $errorMessage = 'Erreur : ' . $e->getMessage();
    }
}

?>

<?php require '../view/header_2.php'; ?>

<!-- FORM PART-->
<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col-md-6">
                <form method="post" enctype="multipart/form-data">
                    <?php if (isset($successMessage)) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= $successMessage ?>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($errorMessage)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= $errorMessage ?>
                        </div>
                    <?php endif; ?>
                    <div class="my-4">
                        <label for="image" class="form-label"><strong>Image du produit</strong></label>
                        <input name="productImage" type="file" class="form-control" id="image">
                    </div>
                    <div class="my-4">
                        <label for="nom" class="form-label"><strong>Nom du produit</strong></label>
                        <input required type="text" class="form-control" id="nom" name="productName" value="<?= htmlspecialchars($nom) ?>">
                    </div>
                    <div class="my-4">
                        <label for="prix" class="form-label"><strong>Son prix</strong></label>
                        <input required type="number" class="form-control" id="prix" name="productPrice" value="<?= htmlspecialchars($prix) ?>">
                    </div>
                    <div class="my-4">
                        <label for="description" class="form-label"><strong>Description du produit</strong></label>
                        <textarea required class="form-control" name="productDescription" id="description"><?= htmlspecialchars($description) ?></textarea>
                    </div>
                    <input name="productSubmit" type="submit" class="btn btn-success" value="Modifier le produit">
                </form>
            </div>
            <!-- Image à droite -->
            <div class="col-md-6">
                <img src="../view/1.png" class="img-fluid" height="550" width="550">
            </div>
        </div>
    </div>
</div>
<!-- FORM PART-->

<?php require '../view/footer_2.php'; ?>