<?php
  $query = (isset($_GET['query'])) ? $_GET['query'] : '';
  $page_number = (isset($_GET['p'])) ? $_GET['p'] : 1;
  $page_size = (isset($_GET['n'])) ? $_GET['n'] : 10;

  $page_title = "Buscar por $query";

  require_once '../vendor/autoload.php';
  require 'assets/templates/head.php';
  require "assets/templates/$lang/non_sticky_nav.php";
  require "assets/templates/$lang/sticky_header.php";

  $options = [
    'allowPartialResults' => true,
    'limit' => $page_size,
    'skip' => ($page_number - 1) * $page_size,
    'projection' => [
      'body' => 1,
      'permalink' => 1,
      'title' => 1,
      'date' => 1
  ]];

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
            echo "<h1>Buscar por ${query}: (${count} resultados)</h1><br>";

            if ($count != 0) {
              foreach ($cursor as $document) {
                echo "<a href=\"${base_url}/posts/" , $document->permalink , "\"><h2>" , $document->title , "</h2></a>";
                echo markdown2html(substr($document->body, 0, 500) . ' <mark> ... </mark>');
                echo '<hr>';
              }
            } else {
              echo "<p class=\"text-center\">Nenhum resultado foi encontrado!" . json_decode('"\u1F62D"') . "</p>";
            }
          ?>
        </div>
      </div>

      <!-- Pagination -->
      <?php
        if ($pages > 1) {
          echo '<nav id="pagination"><ul class="pagination justify-content-center">';

          if ($page_number == 1) {
            echo '<li class="page-item disabled"><a class="page-link" aria-hidden="true">&laquo;</a></li>';
          } else {
            $request = change_page_number($base_url, $page_number, $page_number - 1);
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"${request}\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
          }

          $max = ($pages - $page_number <= 4) ? $pages : $page_number + 4;

          for ($i = $page_number; $i <= $max; $i++) {
            if ($i == $page_number) {
              echo "<li class=\"page-item disabled\"><span class=\"page-link\">${i}</span></li>";
            } else {
              $request = change_page_number($base_url, $page_number, $i);
              echo "<li class=\"page-item\"><a class=\"page-link\" href=\"${request}\">${i}</a></li>";
            }
          }

          if ($page_number == $pages) {
            echo '<li class="page-item disabled"><a class="page-link" aria-hidden="true">&raquo;</a></li>';
          } else {
            $request = change_page_number($base_url, $page_number, $page_number + 1);
            echo "<li class=\"page-item\"><a class=\"page-link\" href=\"${request}\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
          }
          
          echo '</ul></nav>';
        }
      ?>
    </div>
  </main>

<?php
  require "assets/templates/$lang/footer.php";
  require 'assets/templates/foot.php';
