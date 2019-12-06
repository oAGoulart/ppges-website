<?php
  if (isset($_GET['page'])) {
    $static = ($_GET['page'] != '') ? $_GET['page'] : 'sobre';
  } else {
    $static = 'sobre';
  }

  $page_title = ucfirst($static);

  require_once '../vendor/autoload.php';
  require 'assets/templates/head.php';
  require "assets/templates/${lang}/non_sticky_nav.php";
  require "assets/templates/${lang}/sticky_header.php";

  $html = markdown2html(file_get_contents("assets/markdown/${lang}/${static}.md"));

  require "assets/templates/${lang}/post.php";

  require "assets/templates/${lang}/footer.php";
  require 'assets/templates/foot.php';
