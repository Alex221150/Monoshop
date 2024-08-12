<?php

session_start(); // Démarrage de la session

require('config/commendes.php');

$myProduits = Afficher();

?>

<?php require 'view/header.php'; ?>

<style>
    .edit {
        text-decoration: none;
        text-transform: uppercase;
    }

    .title_product,
    .container {
        text-align: center;
        margin-top: 20px;
    }
</style>
<!-- carousel part  -->
<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="view/slide1.png" class="d-block w-100" width="540" height="500">
        </div>
        <div class="carousel-item">
            <img src="view/slide2.png" class="d-block w-100" width="540" height="500">
        </div>
        <div class="carousel-item">
            <img src="view/slide3.png" class="d-block w-100" width="540" height="500">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- carousel part  -->
<!--  MAIN PART -->
<main>
    <div class="album py-5 bg-body-tertiary">
        <div class="title-product">
            <h2 class="container">Nos produits disponibles pour le moment</h2>
        </div>
        <div class="container">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($myProduits as $produit) : ?>
                    <div class="col">
                        <div class="card shadow-sm" style="height: 100%;">
                            <img src="admin/upload/<?= $produit->image ?>" class="card-img-top" alt="photo de nos produits">

                            <div class="card-body">
                                <h5 class="card-title"><?= $produit->nom ?></h5>
                                <p class="card-text"><?= substr($produit->description, 0, 220) ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <?php if (isset($_SESSION['adminSession'])) : ?>
                                            <button type="button" class="btn btn-sm btn-outline-secondary"><a class="edit" href="admin/editer.php">Editer</a></button>
                                    </div>
                                <?php endif; ?>
                                <?php if (!isset($_SESSION['adminSession'])) : ?>
                                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary"><a class="edit" href="admin/edit.php"></a></button> -->
                                </div>
                            <?php endif; ?>

                            <?php
                            $prixPromotionnel = $produit->prix; // Prix actuel
                            $prixOriginal = $prixPromotionnel *  1.05; // Calcul du prix d'origine en soustrayant 55%
                            ?>

                            <!-- Affichage du prix d'origine barré -->
                            <small class="text-body-secondary" style="text-decoration: line-through;">
                                <?= number_format($prixOriginal, 2)  ?> MGA
                            </small>

                            <!-- Affichage du prix promotionnel -->
                            <small class="text-danger">
                                <?= number_format($prixPromotionnel, 2)  ?> MGA
                            </small>
                            </div>
                        </div>
                    </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    </div>
</main>
<!--  MAIN PART -->

<?php require 'view/footer.php'; ?>