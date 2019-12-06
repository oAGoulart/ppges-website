<?php
  $query = (isset($_GET['query'])) ? $_GET['query'] : '';
  $page_number = (isset($_GET['p'])) ? $_GET['p'] : 1;
  $page_size = (isset($_GET['n'])) ? $_GET['n'] : 10;

  $page_title = "Buscar por $query";

  require_once '../vendor/autoload.php';
  require 'assets/templates/head.php';
  require "assets/templates/${lang}/non_sticky_nav.php";
  require "assets/templates/${lang}/sticky_header.php";

  $options = [
    'allowPartialResults' => true,
    'limit' => $page_size,
    'skip' => ($page_number - 1) * $page_size
  ];

  $cursor = query_search($query, $options, $database, $collection, $manager);
  $count = query_count($query, $database, $collection, $manager);
  $pages = $count / $page_size;
?>

  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container">
      <!-- List of Posts -->
      <div class="row">
        <div class="col-md-12">
          <?php
            echo '<h1>Buscar por ', $query, ': (', $count, ' resultados)</h1><br>';

            if ($count != 0) {
              foreach ($cursor as $document) {
                echo '<a href="', $base_url, '/posts/', $document->permalink, '"><h2>', $document->title, '</h2></a>';
                echo markdown2html(substr($document->body, 0, 500), ' <mark> ... </mark>');
                echo '<hr>';
              }
            } else {
              echo "<p class=\"text-center\">Nenhum resultado foi encontrado! \u{1F62D}</p>";
            }
          ?>
        </div>
      </div>

      <!-- Pagination -->
      <?php require 'assets/templates/shared/pagination.php'; ?>
    </div>
  </main>

<?php
  require "assets/templates/${lang}/footer.php";
  require 'assets/templates/foot.php';
