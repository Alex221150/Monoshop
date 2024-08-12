<?php

session_start();

// Vérifie si une session admin est active
if (isset($_SESSION['adminSession'])) {

    // Supprime toutes les variables de session
    $_SESSION = array();

    // Supprime le cookie de session si il existe
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Détruit la session
    session_destroy();

    // Redirige vers la page d'accueil
    header("Location: ../index.php");
    exit(); // Ajoute exit pour s'assurer que le script s'arrête après la redirection
} else {
    // Redirige vers la page de connexion si aucune session n'est trouvée
    header("Location: ../login.php");
    exit(); // Ajoute exit pour s'assurer que le script s'arrête après la redirection
}

// session_start();

// if (isset($_SESSION['adminSession'])) {

// $_SESSION['adminSession'] = array ();

// session_destroy();

// header("Location: ../index.php");
// } else {
// header("Location: ../login.php");
// }
