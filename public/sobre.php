<?php
  $page_title = 'Sobre';

  require_once '../vendor/autoload.php';
  include 'assets/templates/head.php';
  include "assets/templates/$lang/non_sticky_nav.php";
  include "assets/templates/$lang/sticky_header.php";

  $html = markdown2html(file_get_contents('assets/markdown/pt/sobre.md'));

  include 'assets/templates/pt/post.php'

  include "assets/templates/$lang/footer.php";
  include 'assets/templates/foot.php';
