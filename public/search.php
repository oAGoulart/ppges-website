<?php
  $query = (isset($_GET['query'])) ? $_GET['query'] : '';
  $page_number = (isset($_GET['p'])) ? $_GET['p'] : 1;
  $page_size = (isset($_GET['n'])) ? $_GET['n'] : 10;

  $page_title = "Buscar ${query}";

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
?>

  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <?php echo "<h1>Resultados de ${query} em ${collection}: (${count})</h1>"; ?>
          <?php
            foreach ($cursor as $document) {
              echo "<a href=\"${base_url}/posts/${document->permalink}\"><h2>${document->title}</h2></a>";
              echo markdown2html(substr($document->body, 0, 500));
            }
          ?>
        </div>
      </div>
    </div>
  </main>

<?php
  require "assets/templates/$lang/footer.php";
  require 'assets/templates/foot.php';
