<?php
session_start();
require('../config/commendes.php');

if (!isset($_SESSION['adminSession']) || empty($_SESSION['adminSession'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['productSubmit'])) {
    if (isset($_FILES['productImage']) && isset($_POST['productName']) && isset($_POST['productPrice']) && isset($_POST['productDescription'])) {
        $productImage       = $_FILES['productImage'];
        $productName        = htmlspecialchars(strip_tags($_POST['productName']));
        $productPrice       = htmlspecialchars(strip_tags($_POST['productPrice']));
        $productDescription = htmlspecialchars(strip_tags($_POST['productDescription']));

        // Validate file upload
        if ($productImage['error'] === UPLOAD_ERR_OK) {
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
                    try {
                        Ajouter($newFileName, $productName, $productPrice, $productDescription);
                        $successMessage = 'Produit ajouté avec succès !';
                    } catch (Exception $e) {
                        $errorMessage = 'Erreur : ' . $e->getMessage();
                    }
                } else {
                    $errorMessage = 'Erreur lors de l\'upload de l\'image.';
                }
            } else {
                $errorMessage = 'Extension de fichier non autorisée ou taille trop grande.';
            }
        } else {
            $errorMessage = 'Erreur lors du téléchargement de l\'image.';
        }
    } else {
        $errorMessage = 'Veuillez remplir tous les champs.';
    }
}
?>

<?php require '../view/header_2.php'; ?>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row ">
            <div class="col-md-6">
                <!-- Formulaire à gauche row : row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 -->
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
                    <div class="mb-3">
                        <label for="image" class="form-label">Image du produit</label>
                        <input name="productImage" required type="file" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du produit</label>
                        <input required type="text" class="form-control" id="nom" name="productName">
                    </div>
                    <div class="mb-3">
                        <label for="prix" class="form-label">Son prix</label>
                        <input required type="number" class="form-control" id="prix" name="productPrice">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description du produit</label>
                        <textarea required class="form-control" name="productDescription" id="description"></textarea>
                    </div>
                    <input name="productSubmit" type="submit" class="btn btn-success" value="Ajouter un nouveau produit">
                </form>
            </div>
            <!-- Image à droite -->
            <div class="col-md-6">
                <img src="../view/2.jpg" class="img-fluid" alt="Image promotionnelle" height="700" width="700">
            </div>
        </div>
    </div>
</div>

<?php require '../view/footer_2.php'; ?>