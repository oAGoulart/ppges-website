<?php
  require 'assets/templates/head.php';
  require "assets/templates/${lang}/non_sticky_nav.php";
  require "assets/templates/${lang}/sticky_header.php";
?>

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
            <a class="card-link" href=<?php echo "${base_url}/informes/editais"; ?>>
              <img class="card-img-top" src="assets/images/banner.png" alt="Banner 16:9">
              <div class="card-body">
                <h6 class="card-text">Confira os Editais</h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <a class="card-link" href=<?php echo "${base_url}/professores"; ?>>
              <img class="card-img-top" src="assets/images/banner.png" alt="Banner 16:9">
              <div class="card-body">
                <h6 class="card-text">Veja os Orientadores</h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <a class="card-link" href=<?php echo "${base_url}/agenda/eventos"; ?>>
              <img class="card-img-top" src="assets/images/banner.png" alt="Banner 16:9">
              <div class="card-body">
                <h6 class="card-text">Confira os Eventos</h6>
              </div>
            </a>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="card">
            <a class="card-link" href=<?php echo "${base_url}/curso#disciplinas"; ?>>
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

<?php
  require "assets/templates/${lang}/footer.php";
  require 'assets/templates/foot.php';
