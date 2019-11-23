<?php
  $query = $_GET['query'];

  $page_title = "Buscar: $query";

  require_once '../vendor/autoload.php';
  include 'assets/templates/head.php';
  include "assets/templates/$lang/non_sticky_nav.php";
  include "assets/templates/$lang/sticky_header.php";

  $html = "<p>${query}</p>";
  var_dump($response);

  include 'assets/templates/pt/post.php';

  include "assets/templates/$lang/footer.php";
  include 'assets/templates/foot.php';
