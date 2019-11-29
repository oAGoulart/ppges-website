<?php
  $query = (isset($_GET['query'])) ? $_GET['query'] : '';
  $coll = (isset($_GET['coll'])) ? $_GET['coll'] : 'posts';
  $page_number = (isset($_GET['p'])) ? $_GET['p'] : 1;
  $page_size = (isset($_GET['n'])) ? $_GET['n'] : 10;

  $page_title = "Buscar ${query}";

  require_once '../vendor/autoload.php';
  include 'assets/templates/head.php';
  include "assets/templates/$lang/non_sticky_nav.php";
  include "assets/templates/$lang/sticky_header.php";

  echo "<h1>Resultados de ${query} em ${coll}:</h1>";

  $filter = ['$text' => ['$search' => $query]];
  $options = [
    'allowPartialResults' => true,
    'limit' => $page_size,
    'skip' => ($page_number - 1) * $page_size
  ];

  $q = new MongoDB\Driver\Query($filter, $options);
  $cursor = $manager->executeQuery("${database}.${coll}", $q); 

  foreach ($cursor as $document)
    var_dump($document);

  $result = $manager->executeCommand($database, $command);

  include "assets/templates/$lang/footer.php";
  include 'assets/templates/foot.php';
