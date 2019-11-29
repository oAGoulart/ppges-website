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

  $projection = [
    'body' => 1,
    'permalink' => 1,
    'author' => 1,
    'title' => 1,
    'tags' => 1,
    'date' => 1
  ];

  $cursor = query_search($query, $page_size, $page_number, $projection, $database, $collection, $manager);

  echo "<h1>Resultados de ${query} em ${collection}: (" + query_count($query, $database, $collection, $manager) + ")</h1>";

  foreach ($cursor as $document)
    var_dump($document);

  include "assets/templates/$lang/footer.php";
  include 'assets/templates/foot.php';
