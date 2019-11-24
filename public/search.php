<?php
  if (isset($_GET['query'])) {
    $query = $_GET['query'];

    if (isset($_GET['coll']))
      $coll = $_GET['coll'];
  }
  else {
    $query = '';
    $coll = 'posts';
  }

  $page_title = "Buscar $query";

  require_once '../vendor/autoload.php';
  include 'assets/templates/head.php';
  include "assets/templates/$lang/non_sticky_nav.php";
  include "assets/templates/$lang/sticky_header.php";

  echo "<h1>Resultados de ${query} em ${coll}:</h1>";

  $filter = ['body' => $query];
  $options = ['allowPartialResults' => true];

  $q = new MongoDB\Driver\Query($filter, $options);
  $rows = $manager->executeQuery("sample_training.$coll", $q); 

  foreach ($cursor as $document)
    var_dump($document);

  include "assets/templates/$lang/footer.php";
  include 'assets/templates/foot.php';
