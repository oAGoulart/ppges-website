<?php
  $query = (isset($_GET['query'])) ? $_GET['query'] : '';
  $collection = (isset($_GET['coll'])) ? $_GET['coll'] : 'posts';
  $page_number = (isset($_GET['p'])) ? $_GET['p'] : 1;
  $page_size = (isset($_GET['n'])) ? $_GET['n'] : 10;

  $page_title = "Buscar ${query}";

  require_once '../vendor/autoload.php';
  include 'assets/templates/head.php';
  include "assets/templates/$lang/non_sticky_nav.php";
  include "assets/templates/$lang/sticky_header.php";


  $options = [
    'allowPartialResults' => true,
    'limit' => $page_size,
    'skip' => ($page_number - 1) * $page_size,
    'projection' => [
      'body' => 1,
      'permalink' => 1,
      'author' => 1,
      'title' => 1,
      'tags' => 1,
      'date' => 1
  ]];

  $cursor = query_search($query, $options, $database, $collection, $manager);
  $count = query_count($query, $database, $collection, $manager);

  echo "<h1>Resultados de ${query} em ${collection}: (${count})</h1>";

  foreach ($cursor as $document)
    var_dump($document);

  include "assets/templates/$lang/footer.php";
  include 'assets/templates/foot.php';
