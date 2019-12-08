<?php
  $category = (isset($_GET['category'])) ? $_GET['category'] : '';
  $permalink = (isset($_GET['permalink'])) ? $_GET['permalink'] : '';
  $type = (isset($_GET['t'])) ? $_GET['t'] : '';
  $page_number = (isset($_GET['p'])) ? $_GET['p'] : 1;
  $page_size = (isset($_GET['n'])) ? $_GET['n'] : 10;

  if ($permalink != '') {
    $page_title = ucfirst($permalink);
  } else {
    if ($type != '') {
      $page_title = 'Publicações em ' . $type;
    } else {
      $page_title = sprintf('%s', ($category != '') ? 'Publicações em ' . $category : 'Posts');
    }
  }

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
      echo "<main class=\"py-5\"><p class=\"text-center\">Esta publicação não existe! \u{1F62D}</p></main>";
    }
  } else {
    $options = [
      'allowPartialResults' => true,
      'limit' => $page_size,
      'skip' => ($page_number - 1) * $page_size,
      'sort' => ['_id' => -1]
    ];

    if ($category != '') {
      $filter = ($type != '') ? ['category' => $category, 'type' => $type] : ['category' => $category];
    } else {
      $filter = [];
    }

    $cursor = filter_search($filter, $options, $database, $collection, $manager);
    $count = filter_count($filter, $database, $collection, $manager);
    $pages = ceil($count / $page_size);

    echo '<main class="my-5"><div class="container"><div class="row"><div class="col-md-12">';
    printf('<h1>%s: (%d resultados)</h1><br>', ($category != '') ? 'Publicações em ' . $category : 'Posts', $count);

    if ($count != 0) {
      foreach ($cursor as $document) {
        echo '<a href="', $base_url, (isset($document->category)) ? '/' . $document->category . '/' : '/',
             $document->permalink, '"><h2>', $document->title, '</h2></a>';
        if (strlen($document->body) >= 500) {
          echo markdown2html(substr($document->body, 0, 500) . ' <mark> ... </mark>');
        } else {
          echo markdown2html($document->body);
        }
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
