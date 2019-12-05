<?php
  $page_title = 'Sobre';

  require_once '../vendor/autoload.php';
  require 'assets/templates/head.php';
  require "assets/templates/${lang}/non_sticky_nav.php";
  require "assets/templates/${lang}/sticky_header.php";

  $html = markdown2html(file_get_contents("assets/markdown/${lang}/sobre.md"));

  require "assets/templates/${lang}/post.php";

  require "assets/templates/${lang}/footer.php";
  require 'assets/templates/foot.php';
