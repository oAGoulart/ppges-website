<?php
  $page_title = 'Sobre';

  include 'assets/templates/head.php';
  include "assets/templates/$lang/non_sticky_nav.php";
  include "assets/templates/$lang/sticky_header.php";
  require_once '../vendor/autoload.php';

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
            <?php echo $tocGenerator->getHtmlMenu($html, 1, 6); ?>
          </ul>
          <ul class="list-group discover-links">
            <li class="list-group-item text-uppercase">Descubra Mais</li>
            <li class="list-group-item">
              <a href=<?php echo 'https://' , $_SERVER['SERVER_NAME'] , '/coordenacao'; ?>>
                Coordenação
              </a>
            </li>
            <li class="list-group-item">
              <a href="<?php echo 'https://' , $_SERVER['SERVER_NAME'] , '/professores'; ?>">
                Professores Orientadores
              </a>
            </li>
            <li class="list-group-item">
              <a href=<?php echo 'https://' , $_SERVER['SERVER_NAME'] , '/alunos'; ?>>
                Alunos
              </a>
            </li>
            <li class="list-group-item">
              <a href=<?php echo 'https://' , $_SERVER['SERVER_NAME'] , '/seminarios'; ?>>
                Ciclo de Seminários e Palestras
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </main>

<?php
  include "assets/templates/$lang/footer.php";
  include 'assets/templates/foot.php';
