<?php
  $page_title = 'Sobre';

  require_once '../vendor/autoload.php';
  include 'assets/templates/head.php';
  include "assets/templates/$lang/non_sticky_nav.php";
  include "assets/templates/$lang/sticky_header.php";

  $html = markdown2html(file_get_contents('assets/markdown/pt/sobre.md'));
?>

  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container">
      <div class="row">
        <!-- Main Text Body -->
        <div class="col-sm-9">
          <?php echo $html; ?>
        </div>

        <!-- Discover Links -->
        <div class="col-sm-3">
          <ul class="list-group discover-links">
            <li class="list-group-item text-uppercase">Índice</li>
            <?php echo header2toc($html) ?>
          </ul>
          <ul class="list-group discover-links">
            <li class="list-group-item text-uppercase">Descubra Mais</li>
            <?php
              $links = array(
                array('url' => "https://${_SERVER['SERVER_NAME']}/coordenacao", 'name'=>'Coordenação'),
                array('url' => "https://${_SERVER['SERVER_NAME']}/professores", 'name'=>'Professores Orientadores'),
                array('url' => "https://${_SERVER['SERVER_NAME']}/alunos", 'name'=>'Alunos'),
                array('url' => "https://${_SERVER['SERVER_NAME']}/seminarios", 'name'=>'Ciclo de Seminários e Palestras')
              );

              $items = $links[array_rand($links), 4];

              for ($i = 0; $i < 4; $i++) {
                echo '<li class="list-group-item">';

                printf('<a href="%s" title="%s">%s</a>', $item[$i]['url'], $item[$i]['name'], $item[$i]['name']);

                echo '</li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </main>

<?php
  include "assets/templates/$lang/footer.php";
  include 'assets/templates/foot.php';
