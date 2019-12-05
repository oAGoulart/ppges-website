<?php
  $page_title = 'Curso';

  require_once '../vendor/autoload.php';
  require 'assets/templates/head.php';
  require "assets/templates/${lang}/non_sticky_nav.php";
  require "assets/templates/${lang}/sticky_header.php";

  $html = markdown2html(file_get_contents('assets/markdown/pt/curso.md'));

  require 'assets/templates/pt/post.php';

  require "assets/templates/${lang}/footer.php";
  require 'assets/templates/foot.php';
