  <!-- Sticky Header -->
  <header class="navbar sticky-top navbar-expand-md">
    <div class="container justify-content-between text-uppercase font-weight-bold">
      <a class="navbar-brand" href=<?php echo $base_url; ?>>
        <img id="logo" alt="PPGES" src=<?php echo $base_url, '/assets/images/logo.png'; ?>>
      </a>
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
            <a class="nav-link" href=<?php echo $base_url, '/sobre'; ?>>Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?php echo $base_url, '/curso'; ?>>Curso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?php echo $base_url, '/pesquisas'; ?>>Pesquisas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?php echo $base_url, '/informes'; ?>>Informes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href=<?php echo $base_url, '/agenda'; ?>>Agenda</a>
          </li>
        </ul>

        <!-- Search Bar -->
        <form class="form-inline" method="GET" action=<?php echo $base_url, '/search'; ?>>
          <div class="input-group">
            <input class="form-control form-control-sm" name="query" type="search" placeholder="Buscar..." aria-label="Buscar">
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
