<nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MT-WEB</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="accueil.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="accueil.php">Liste Objets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Deconnexion</a>
          </li>
        </ul>
        <li class="nav-item dropdown me-5">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Rechercher <img src="../assets/bootstrap/bootstrap-icons/icons/search.svg" alt="">
          </a>
          <ul class="dropdown-menu p-3" style="min-width: 300px;">
            <form action="traitement_rech.php" method="post">
              <div class="mb-2">
                <label for="nom_employe" class="form-label">Nom employe</label>
                <input type="text" class="form-control" name="nom_employe" id="nom_employe">
              </div>
              <div class="mb-2">
                <label for="nom_dept" class="form-label">Nom departement</label>
                <input type="text" class="form-control" name="nom_dept" id="nom_dept">
              </div>
              <div class="mb-2">
                <label for="age_minimum" class="form-label">Age minimum</label>
                <input type="number" class="form-control" min="0" name="age_minimum" id="age_minimum">
              </div>
              <button type="submit" class="btn btn-primary w-100">Rechercher</button>
            </form>
          </ul>
        </li>
      </div>
    </div>
  </nav>
  