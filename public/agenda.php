<?php
  $page_title = "Agenda";

  require_once '../vendor/autoload.php';
  require 'assets/templates/head.php';
  require "assets/templates/${lang}/non_sticky_nav.php";
  require "assets/templates/${lang}/sticky_header.php";

  $cursor = filter_search([], [], $database, 'agenda', $manager);
?>

  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container">
      <!-- List of Posts -->
      <div class="row">
        <div class="col-sm-9">
          <?php
            echo "<h1>${page_title}</h1><br>";

            foreach ($cursor as $document) {
              echo '<div class="card">';
              echo markdown2html($document->body);
              echo '</div>';
            }
          ?>
        </div>

        <!-- Discover Links -->
        <div class="col-sm-3">
          <?php require "assets/templates/${lang}/discover_links.php"; ?>
        </div>
      </div>
    </div>
  </main>

<?php
  require "assets/templates/${lang}/footer.php";
  require 'assets/templates/foot.php';
