<?php
  $query = (isset($_GET['query'])) ? $_GET['query'] : '';
  $coll = (isset($_GET['coll'])) ? $_GET['coll'] : 'posts';
  $field = (isset($_GET['field'])) ? $_GET['field'] : 'body';

  $page_title = "Buscar ${query}";

  require_once '../vendor/autoload.php';
  include 'assets/templates/head.php';
  include "assets/templates/$lang/non_sticky_nav.php";
  include "assets/templates/$lang/sticky_header.php";

  // index query
  $command = new MongoDB\Driver\Command([
    "createIndexes" => $coll,
      "indexes" => [[
        "name" => "textIndex",
        "key"  => ["$**" => "text"],
        "ns"   => "${database}.${coll}",
    ]],
  ]);

  $result = $manager->executeCommand($database, $command);

  echo "<h1>Resultados de ${query} em ${coll}:</h1>";

  $filter = ['$text' => ['$search' => $query]];
  $options = ['allowPartialResults' => true];

  $q = new MongoDB\Driver\Query($filter, $options);
  $cursor = $manager->executeQuery("${database}.${coll}", $q); 

  foreach ($cursor as $document)
    var_dump($document);

  // drop index
  $command = new MongoDB\Driver\Command([
    "dropIndexes" => $coll,
      "indexes" => [[
        "name" => "textIndex"
    ]],
  ]);

  $result = $manager->executeCommand($database, $command);

  include "assets/templates/$lang/footer.php";
  include 'assets/templates/foot.php';
