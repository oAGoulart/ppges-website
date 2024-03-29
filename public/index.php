<?php
  require 'assets/templates/head.php';
  require "assets/templates/${lang}/non_sticky_nav.php";
  require "assets/templates/${lang}/sticky_header.php";
?>

  <!-- Page's Contents -->
  <main class="my-5">
    <!-- Recent Feed -->
    <div class="container recent-feed">
      <div class="row align-items-center">
        <?php
          $options = [
            'allowPartialResults' => true,
            'limit' => 4,
            'sort' => ['_id' => -1]
          ];

          $cursor = filter_search([], $options, $database, $collection, $manager)->toArray();

          echo '<div class="col-md-9"><div class="card bg-dark">';
          printf(
            '<a href="%s"><img class="card-img gradient" src="%s" alt="%s"></a>',
            $base_url . '/' . $cursor[0]->category . '/' . $cursor[0]->permalink,
            (isset($cursor[0]->img_url)) ? $cursor[0]->img_url : $img_gen . $cursor[0]->title,
            $cursor[0]->title
          ); 
          echo '</div></div>';

          echo '<div class="col-md-3">';
          foreach ($cursor as $i => $document) {
            if ($i > 0) {
              echo '<div class="row my-3"><div class="col-sm"><div class="card bg-dark gradient">';
              printf(
                '<a href="%s"><img class="card-img" src="%s" alt="%s"></a>',
                $base_url . '/' . $cursor[0]->category . '/' . $document->permalink,
                (isset($document->img_url)) ? $document->img_url : $img_gen . $document->title,
                $document->title
              ); 
              echo '</div></div></div>';
            }
          }
          echo '</div>';
        ?>
      </div>
    </div>

    <!-- Featured Feed -->
    <div class="container featured-feed text-center">
      <!-- Title -->
      <h1 class="intro-title text-uppercase font-weight-bold">
        Destaques
      </h1>

      <!-- Featured Cards -->
      <div class="card-deck my-5">
        <?php
          $cursor = filter_search([], [], $database, 'discover_links', $manager);
          $discover_links = $cursor->toArray();

          $items = array_rand($discover_links, 4);

          for ($i = 0; $i < 4; $i++) {
            echo '<div class="card">';

            printf('<a href=%s/%s>', $base_url, $discover_links[$items[$i]]->permalink);
            echo '<img class="card-img-top gradient" src="',
                 $img_gen, $discover_links[$items[$i]]->name,
                 '" alt="', $discover_links[$items[$i]]->name, '">';
            printf('<div class="card-body"><h6 class="card-text">%s</h6></div>',
                   $discover_links[$items[$i]]->description);

            echo '</a></div>';
          }
        ?>
      </div>
    </div>
  </main>

<?php
  require "assets/templates/${lang}/footer.php";
  require 'assets/templates/foot.php';
