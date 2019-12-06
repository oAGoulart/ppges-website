<?php
  $category = (isset($_GET['category'])) ? $_GET['category'] : '';
  $permalink = (isset($_GET['permalink'])) ? $_GET['permalink'] : '';
  $type = (isset($_GET['t'])) ? $_GET['t'] : '';
  $page_number = (isset($_GET['p'])) ? $_GET['p'] : 1;
  $page_size = (isset($_GET['n'])) ? $_GET['n'] : 10;

  $page_title = sprintf('%s', $category != '' ? 'Publicações em ' . $category : 'Posts');

  require_once '../vendor/autoload.php';
  require 'assets/templates/head.php';
  require "assets/templates/${lang}/non_sticky_nav.php";
  require "assets/templates/${lang}/sticky_header.php";

  if ($permalink != '' && $category != '') {
    $cursor = filter_search(['category' => $category, 'permalink' => $permalink], ['limit' => 1], $database, 'posts', $manager);

    $document = $cursor->toArray()[0];

    if (isset($document->body)) {
      $html = markdown2html($document->body);

      require "assets/templates/${lang}/post.php";
    } else {
      echo "<p class=\"text-center\">Esta publicação não existe! \u{1F62D}</p>";
    }
  } else {
    $options = [
      'allowPartialResults' => true,
      'limit' => $page_size,
      'skip' => ($page_number - 1) * $page_size
    ];

    $cursor = filter_search(['category' => $category, 'type' => $type], $options, $database, $collection, $manager);
    $count = filter_count(['category' => $category, 'type' => $type], $database, $collection, $manager);
    $pages = $count / $page_size;

    echo '<main class="my-5"><div class="container"><div class="row"><div class="col-md-12">';
    printf('<h1>%s: (%i resultados)</h1><br>', $category != '' ? 'Publicações em ' . $category : 'Posts', $count);

    if ($count != 0) {
      foreach ($cursor as $document) {
        echo '<a href="', $base_url, '"', $document->category, '/',
             $document->permalink, '"><h2>', $document->title, '</h2></a>';
        echo markdown2html(substr($document->body, 0, 500) . ' <mark> ... </mark>');
        echo '<hr>';
      }
    } else {
      echo "<p class=\"text-center\">Nenhum resultado foi encontrado! \u{1F62D}</p>";
    }

    echo '</div></div>';

    require 'assets/templates/shared/pagination.php';

    echo '</div></main>';
  }

  require "assets/templates/${lang}/footer.php";
  require 'assets/templates/foot.php';
