<?php

session_start();


require "config/commendes.php";

$error_submit = ''; // Initialisation de la variable

if (isset($_POST['adminSubmit'])) {
    if (!empty($_POST['adminEmail']) && !empty($_POST['adminPassword'])) {
        $adminEmail = htmlspecialchars($_POST['adminEmail']);
        $adminPassword = htmlspecialchars($_POST['adminPassword']);

        $admin = getAdmin($adminEmail, $adminPassword);

        if ($admin) {
            $_SESSION['adminSession'] = $admin;
            header("Location: admin/ajouter.php");
        } else {
            $error_submit = "<div class='alert alert-danger' role='alert'>Un problème de connexion, veuillez bien vérifier vos informations</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Webcraft service | connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="theme-color" content="#712cf9">
    <style>
        body {
            background: linear-gradient(to bottom, white, black);
            font-family: Arial, sans-serif;
            display: flex;
            /* Active Flexbox sur le body */
            justify-content: center;
            /* Centre horizontalement le contenu du body */
            align-items: center;
            /* Centre verticalement le contenu du body */
            height: 100vh;
            /* Assure que le body occupe toute la hauteur de la fenêtre */
            margin: 0;
            /* Supprime les marges par défaut du body */
        }


        .login-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            /* Définit la largeur maximale du conteneur du formulaire */
            width: 100%;
            /* Assure que le conteneur prend 100% de la largeur disponible jusqu'à max-width */
        }

        .login-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 30px;
        }

        .restaurant-logo {
            display: block;
            margin: 0 auto 20px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 2px solid #007bff;
            overflow: hidden;
        }

        .restaurant-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .btn-login {
            width: 100%;
        }

        .text-muted {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2 class="login-title">Espace d'administration</h2>
        <div class="restaurant-logo">
            <img src="view/lg.jpg" alt="webcraft logo">
        </div>
        <?php
        if ($error_submit) {
        ?>
            <?php
            echo $error_submit;
            ?>
        <?php
        }
        ?>
        <form method="post">
            <div class="mb-3">
                <input name="adminEmail" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="tony@gmail.com" required>
            </div>
            <div class="mb-3">
                <input name="adminPassword" type="password" id="pwd" class="form-control" placeholder="Password" required>
                <input type="checkbox" id="chk"> Show password
            </div>
            <input name="adminSubmit" type="submit" class="btn btn-primary btn-login my-1" value="Se connecter">
        </form>
        <p class="text-muted mt-3">Revenir à la page d' <a href="index.php">accueil</a></p>
    </div>

    <script>
        const pwd = document.getElementById("pwd");
        const chk = document.getElementById("chk");

        chk.onchange = function(e) {
            pwd.type = chk.checked ? "text" : "password";
        }
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>