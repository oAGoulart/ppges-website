<?php
  $page_title = "Professores Orientadores";

  require_once '../vendor/autoload.php';
  require 'assets/templates/head.php';
  require "assets/templates/${lang}/non_sticky_nav.php";
  require "assets/templates/${lang}/sticky_header.php";

  $cursor = filter_search(['type' => 'professor'], [], $database, 'academics', $manager);
?>

  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container">
      <div class="row flex-md-row-reverse">
        <!-- Discover Links -->
        <div class="col-md-3">
          <?php require "assets/templates/${lang}/discover_links.php"; ?>
        </div>

        <!-- List of Professors -->
        <div class="col-md-9">
          <?php
            echo '<h1>', $page_title, '</h1><br>';

            foreach ($cursor as $document) {
              echo '<div class="card my-3 p-3 post-card"><div class="media">';
              if (isset($document->img_url)) {
                printf(
                  '<a href="%s"><img width="128" height="128" class="align-self-start mr-3" src="%s" alt="%s"></a>',
                  (isset($document->link)) ? $document->name : '#',
                  $document->img_url,
                  $document->name
                );
              }
              echo '<div class="media-body">', markdown2html($document->body), '</div>';
              echo '</div></div>';
            }
          ?>
        </div>
      </div>
    </div>
  </main>

<?php
  require "assets/templates/${lang}/footer.php";
  require 'assets/templates/foot.php';
