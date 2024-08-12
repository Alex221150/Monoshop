<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monoshop, espace admin: Publier</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-NHEnk9G/3pLRd+Ob8hWmEwmyCsCRX6E1gR99f2D5x/2kVYX9c1ytJm5QOfCmj6G9OxI6RczdM6OkeRWSFbd0w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
  <?php
  $current_page = basename($_SERVER['PHP_SELF']);
  ?>
  <!-- HEADER PART -->

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid mt-3">
      <a class="navbar-brand" href="../index.php"><em>WEBCRAFT SHOPPING</em></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'ajouter.php') ? 'active' : ''; ?>" aria-current="page" href="ajouter.php">
              <i class="fas fa-plus"></i> NOUVEAU
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'supprimer.php') ? 'active' : ''; ?>" href="supprimer.php">
              <i class="fas fa-trash-alt"></i> SUPPRESSION
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'editer.php') ? 'active' : ''; ?>" href="editer.php">
              <i class="fas fa-box"></i> PRODUITS
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'edit.php') ? 'active' : ''; ?>" href="edit.php">
              <i class="fas fa-edit"></i> MODIFICATION
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo ($current_page == 'details.php') ? 'active' : ''; ?>" href="details.php">
              <i class="fas fa-info-circle"></i> DETAILS
            </a>
          </li>
        </ul>
        <div style="display: flex; justify-content: flex-end">
          <a id="logoutBtn" href="deconnexion.php" class="btn btn-danger">
            <i class="fas fa-sign-out-alt"></i> Se déconnecter
          </a>
        </div>
      </div>
    </div>
  </nav>
  <!-- HEADER PART -->

  <!-- Confirmation Popup -->
  <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel"><i class="fas fa-sign-out-alt"></i> Confirmation de déconnexion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Êtes-vous sûr de vouloir vous déconnecter ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <a id="confirmLogout" href="deconnexion.php" class="btn btn-danger">
            <i class="fas fa-check"></i> Se déconnecter
          </a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-16c5lf5x5F8D8EuvXYMl3HkTpLgs9MII0G7lOHVmgLQFptX1Ke6QPYeknXr5xU1S" crossorigin="anonymous"></script>
  <script>
    document.getElementById('logoutBtn').addEventListener('click', function(event) {
      event.preventDefault();
      var logoutModal = new bootstrap.Modal(document.getElementById('logoutModal'));
      logoutModal.show();
    });

    document.getElementById('confirmLogout').addEventListener('click', function() {
      window.location.href = this.getAttribute('href');
    });
  </script>

</body>

</html>