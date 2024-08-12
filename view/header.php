<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="/docs/5.3/assets/js/color-modes.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Bienvenue chez Webcraft service</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <meta name="theme-color" content="#712cf9">
</head>

<body>
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <!-- SVG content -->
  </svg>

  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <!-- Theme options -->
    </ul>
  </div>

  <!-- HEADER PART -->
  <header data-bs-theme="dark">
    <div class="collapse text-bg-dark" id="navbarHeader">
      <div class="container">
        <div class="row">
          <!-- <div class="col-sm-8 col-md-7 py-4">
            <h4>À propos de nous</h4>
            <p class="text-body-secondary">Nous avons conçu ce site pour faciliter la gestion de produits, offrant une plateforme intuitive et efficace pour les entreprises.</p>
          </div> -->
          <div class="col-sm-8 col-md-7 py-4">
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4>À propos de Webcraft Service</h4>
            <p class="text-body-secondary">Webcraft Service se spécialise dans les solutions numériques, y compris les systèmes de gestion de produits et plus encore. Notre expertise garantit des expériences numériques fluides adaptées à vos besoins commerciaux.</p>
            <!-- Afficher les crud options quand c'est connecté et afficher le bouton de connexion dans l'autre cas -->
            <ul class="list-unstyled">
              <?php if (!isset($_SESSION['adminSession'])) : ?>
                <li><a href="login.php" class="text-white">Connexion</a></li>
                <li><a href="contact.php" class="text-white">Nous contacter</a></li>
                <li><a href="fb/index.html" class="text-white">Jouer</a></li>
              <?php endif; ?>

              <?php if (isset($_SESSION['adminSession'])) : ?>
                <li><a href="./admin/ajouter.php" class="text-white">Ajout</a></li>
                <li><a href="./admin/supprimer.php" class="text-white">Suppression</a></li>
                <li><a href="#" class="text-white" data-bs-toggle="modal" data-bs-target="#logoutModal">Déconnexion</a></li>
              <?php endif; ?>
            </ul>
            <!-- Afficher les crud options quand c'est connecté et afficher le bouton de connexion dans l'autre cas -->
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
      <div class="container">
        <a href="index.php" class="navbar-brand d-flex align-items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24">
            <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z" />
            <circle cx="12" cy="13" r="4" />
          </svg>
          <strong>Webcraft Service</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </div>
  </header>
  <!-- HEADER PART -->

  <!-- Logout Confirmation Modal -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel">Confirmer la déconnexion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Êtes-vous sûr de vouloir vous déconnecter ?
        </div>
        <div class="modal-footer">
          <form action="./admin/deconnexion.php" method="POST" class="d-inline">
            <button type="submit" class="btn btn-primary">Oui</button>
          </form>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Non</button>
        </div>
      </div>
    </div>
  </div>