<?php
  $query = $_GET['query'];

  $page_title = "Buscar: $query";

  require_once '../vendor/autoload.php';
  include 'assets/templates/head.php';
  include "assets/templates/$lang/non_sticky_nav.php";
  include "assets/templates/$lang/sticky_header.php";

  $html = "<p>${query}</p>";
  $filter = ['text' => $query];
  $options = [];

  $query = new MongoDB\Driver\Query($filter, $options);
  $rows = $manager->executeQuery('sample_mflix.comments', $query); 
  foreach ($rows as $r) {
    pr($r);
  }

  include 'assets/templates/pt/post.php';

  include "assets/templates/$lang/footer.php";
  include 'assets/templates/foot.php';
