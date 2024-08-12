<?php

session_start();

if (isset($_POST['userSubmit'])) {
    extract($_POST);
    if (
        isset($userName) && $userName != "" &&
        isset($userEmail) && $userEmail != "" &&
        isset($userPhone) && $userPhone != "" &&
        isset($userMessage) && $userMessage != ""
    ) {
        $to = "Tonyjaalex@gmail.com";
        $subject = "Vous avez reçu un message de :" . $userEmail;

        $message = "<p>Vous avez reçu un message de:<strong>" . $userEmail . "</strong></p>
        <p><strong>Nom:</strong>" . $userName . "</p>
        <p><strong>Téléphone:</strong>" . $userPhone . "</p>
        <p><strong>Message:</strong>" . $userMessage . "</p>
        ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <' . $userEmail . '>' . "\r\n";

        $send = mail($to, $subject, $message, $headers);

        if ($send) {
            $_SESSION['success_submit'] = "Message bien envoyée !";
            $success_color = 'green';
        } else {
            $success_submit = "Message non envoyée !";
            $success_color = 'red';
        }
    } else {
        $empty_error = "Veuiller à bien remplir tout les champs !";
        $error_color = 'red';
    }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notre page de contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta name="theme-color" content="#712cf9">
    <style>
        body {
            background: linear-gradient(to bottom, white, black);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .contact-container {
            background-color: #fff;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }

        .contact-title {
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

        .btn-contact {
            width: 100%;
        }

        .text-muted {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="contact-container">
        <?php
        if (isset($empty_error)) {
            echo "<p class='alert alert-danger'>$empty_error</p>";
        }

        if (isset($_SESSION['success_submit'])) {
            echo "<p class='alert alert-success'>{$_SESSION['success_submit']}</p>";
        }
        ?>
        <h2 class="contact-title">Contactez-nous</h2>
        <div class="restaurant-logo">
            <img src="view/lg.jpg" alt="webcraft logo">
        </div>
        <form action="contact.php" method="post">
            <div class="mb-3">
                <input type="text" name="userName" class="form-control" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="mb-3">
                <input type="email" name="userEmail" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="number" name="userPhone" class="form-control" placeholder="Téléphone" required>
            </div>
            <div class="mb-3">
                <textarea name="userMessage" class="form-control" rows="4" placeholder="Message" required></textarea>
            </div>
            <input type="submit" value="Envoyer" name="userSubmit" class="btn btn-primary btn-contact my-1">
        </form>
        <p class="text-muted mt-3">Revenir à la page d' <a href="index.php">accueil</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>