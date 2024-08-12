<?php
// editer.php = afficher.php:nomdu fichier dans la video tutoriel (Affichage de tout les produits à modifier)
session_start();

if (!isset($_SESSION['adminSession'])) {
    header("Location: ../login.php");
}

if (empty($_SESSION['adminSession'])) {
    header("Location: ../login.php");
}

require('../config/commendes.php');
$myProduits = Afficher();


?>

<?php require '../view/header_2.php'; ?>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <table class="table">
                <thead>
                    <tr>
                        <!-- <th scope="col">Id</th> -->
                        <th scope="col">Image</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix</th>
                        <th scope="col">Description</th>
                        <th scope="col">Editer</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($myProduits as $singleProduct) : ?>
                        <tr>
                            <td>
                                <img src="upload/<?= $singleProduct->image ?>" alt="Photo de nos produits" style="width: 24.75%;">
                            </td>
                            <td><?= $singleProduct->nom ?></td>
                            <td style="font-weight: bold; color: green"><?= $singleProduct->prix ?> MGA</td>
                            <td><?= substr($singleProduct->description, 0, 180)  ?> ...</td>
                            <td><a href="edit.php?pdt=<?= $singleProduct->id ?>"><i class="fa fa-pencil"></i>Modifier</a></td>
                            <td><a href="details.php?pdt=<?= $singleProduct->id ?>"><i class="fa fa-eye"></i>Details</a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../view/footer_2.php'; ?>