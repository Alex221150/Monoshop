<?php

session_start();

if (!isset($_SESSION['adminSession'])) {
  header("Location: ../login.php");
}

if (empty($_SESSION['adminSession'])) {
  header("Location: ../login.php");
}

require('../config/commendes.php');
$myProduits = Afficher();

if (isset($_POST['productDelete'])) {
    if (isset($_POST['productId']) ) {
        if (!empty($_POST['productId']) ) {
            $productId =  htmlspecialchars(strip_tags($_POST['productId']));

            try {
                Supprimer($productId);
            } catch (Exception $e) {
                $e -> getMessage();
            }
        }
    }
}

?>

<?php require '../view/header_2.php' ; ?>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-3"> <!--  --> 
            <form method="post">
            <div class="mb-3">
                <label for="productId" class="form-label">Identifiant du produit</label>
                <input required type="number" class="form-control" id="productId" name="productId">
            </div>

            <input name="productDelete" type="submit" class="btn btn-warning" value="Supprimer un produit">
            </form>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($myProduits as $produit) : ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="upload/<?= $produit -> image ?>" alt="photo de nos produits">
                        <h3><?= $produit -> id ?></h3>
                        <h5><?= $produit -> nom ?></h5>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require '../view/footer_2.php' ; ?>