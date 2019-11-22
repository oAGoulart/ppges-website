<?php include( 'head.php' ) ?>
  <!-- Non-Sticky Navbar -->
  <nav id="nav">
    <div class="container text-uppercase font-weight-bold">
      <ul class="nav justify-content-end">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lang</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Português</a>
            <a class="dropdown-item" href="en/index.html">English</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://unipampa.edu.br/portal/">Portal Unipampa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contato</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Sticky Header -->
  <header class="navbar sticky-top navbar-expand-md">
    <div class="container justify-content-between text-uppercase font-weight-bold">
      <a class="navbar-brand" href="#"><img id="logo" src="assets/images/logo.png" alt="PPGES"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Navegar">
        <span class="navbar-toggler-icon">
          <i class="material-icons">menu</i>
        </span>
      </button>

      <!-- Main Menu -->
      <div class="collapse navbar-collapse" id="navbarToggler">
        <!-- Links -->
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="sobre/index.html">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Curso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pesquisas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Notícias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Agenda</a>
          </li>
        </ul>

        <!-- Search Bar -->
        <form class="form-inline">
          <div class="input-group">
            <input class="form-control form-control-sm" type="search" placeholder="Buscar..." aria-label="Buscar">
            <div class="input-group-append">
              <div class="input-group-text">
                <button class="search-btn" type="submit"><i class="material-icons">search</i></button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </header>

  <!-- Page's Contents -->
  <main class="my-5">
    <!-- Recent Feed -->
    <div class="container recent-feed">
      <div class="row align-items-center">
        <!-- Main Card -->
        <div class="col-sm-9">
          <div class="card bg-dark">
            <a href="#"><img class="card-img" src="assets/images/banner.png" alt="Banner 16:9"></a>
          </div>
        </div>

        <!-- Other Cards -->
        <div class="col-sm-3">
          <div class="row my-3">
            <div class="col-sm">
              <div class="card bg-dark">
                <a href="#"><img class="card-img" src="assets/images/banner.png" alt="Banner 16:9"></a>
              </div>
            </div>
          </div>
          <div class="row my-3">
            <div class="col-sm">
              <div class="card bg-dark">
                <a href="#"><img class="card-img" src="assets/images/banner.png" alt="Banner 16:9"></a>
              </div>
            </div>
          </div>
          <div class="row my-3">
            <div class="col-sm">
              <div class="card bg-dark">
                <a href="#"><img class="card-img" src="assets/images/banner.png" alt="Banner 16:9"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Featured Feed -->
    <div class="container featured-feed text-center">
      <!-- Title -->
      <h1 class="intro-title text-uppercase font-weight-bold">
        Destaques
      </h1>

      <!-- Featured Cards -->
      <div class="row align-items-center my-5">
        <div class="col-sm-3">
          <div class="card">
            <a href="#" class="card-link">
              <img class="card-img-top" src="assets/images/banner.png" alt="Banner 16:9">
              <div class="card-body">
                <h6 class="card-text">Confira os Editais</h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <a href="#" class="card-link">
              <img class="card-img-top" src="assets/images/banner.png" alt="Banner 16:9">
              <div class="card-body">
                <h6 class="card-text">Veja os Orientadores</h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <a href="#" class="card-link">
              <img class="card-img-top" src="assets/images/banner.png" alt="Banner 16:9">
              <div class="card-body">
                <h6 class="card-text">Confira os Eventos</h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <a href="#" class="card-link">
              <img class="card-img-top" src="assets/images/banner.png" alt="Banner 16:9">
              <div class="card-body">
                <h6 class="card-text">Mapa de Disciplinas</h6>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="py-5">
    <div class="container text-uppercase font-weight-bold">
      <div class="row align-items-center">
        <!-- Unipampa Logo -->
        <div class="col-sm-9">
          <a href="https://unipampa.edu.br/portal/"><img id="unipampa" src="assets/images/unipampa.jpg" alt="Unipampa"></a>
        </div>

        <!-- Links -->
        <div class="col-sm-3">
          <ul class="list-group">
            <li class="list-group-item p-1">
              <a class="footer-link" href="#">Ouvidoria</a>
            </li>
            <li class="list-group-item p-1">
              <a class="footer-link" href="#">Identidade Visual</a>
            </li>
            <li class="list-group-item p-1">
              <a class="footer-link" href="#">Institucional</a>
            </li>
            <li class="list-group-item p-1">
              <a class="footer-link" href="#">Mapa do Site</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="row text-center mt-5">
        <!-- Copyright Statement -->
        <div class="col-xl-12">
          <p>Todos os direitos reservados &copy; 2019 Unipampa</p>
        </div>
      </div>
    </div>
  </footer>

<?php include( 'foot.php' ) ?>
