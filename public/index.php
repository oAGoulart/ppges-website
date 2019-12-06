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
        <div class="col-md-9">
          <div class="card bg-dark">
            <a href="#"><img class="card-img" src="assets/images/banner.png" alt="Banner 16:9"></a>
          </div>
        </div>

        <!-- Other Cards -->
        <div class="col-md-3">
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
      <div class="card-deck my-5">
        <?php
          $cursor = filter_search([], [], $database, 'discover_links', $manager);
          $discover_links = $cursor->toArray();

          $items = array_rand($discover_links, 4);

          for ($i = 0; $i < 4; $i++) {
            echo '<div class="card">';

            printf('<a href=%s/%s>', $discover_links[$items[$i]]->permalink, $base_url);
            echo '<img class="card-img-top" src="', $base_url, '/assets/images/banner.png" alt="Banner 16:9">';
            printf('<div class="card-body"><h6 class="card-text">%s</h6></div>',
                   $discover_links[$items[$i]]->description);

            echo '</a></div>';
          }
        ?>
      </div>
    </div>
  </main>

<?php
  require "assets/templates/${lang}/footer.php";
  require 'assets/templates/foot.php';
