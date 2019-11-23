<?php
  $page_title = 'Sobre';

  include 'assets/templates/head.php';
  include "assets/templates/$lang/non_sticky_nav.php";
  include "assets/templates/$lang/sticky_header.php";
  require_once '../vendor/autoload.php';
?>

  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container">
      <div class="row">
        <!-- Main Text Body -->
        <div class="col-sm-9">
          <?php
            $markupFixer = new TOC\MarkupFixer();

            $file = file_get_contents('assets/markdown/pt/sobre.md');
            $html = Parsedown::instance()->text($file);

            // add style class to all headers
            for ($i = 1; $i <= 6; $i++)
              $html = str_replace("<h${i}>", "<h${i} class=\"title-anchor\">", $html);

            $html = $markupFixer->fix($html);

            echo $html;
          ?>
        </div>

        <!-- Discover Links -->
        <div class="col-sm-3">
          <?php
            $options = [
              'currentAsLink' => false,
              'currentClass'  => 'list-group-item',
              'ancestorClass' => 'list-group-item text-uppercase',
              'branch_class'  => 'list-group discover-links'
            ];

            $renderer = new Knp\Menu\Renderer\ListRenderer(new Knp\Menu\Matcher\Matcher(), $options);

            // Render the list
            $tocGenerator = new TOC\TocGenerator();
            $list = $tocGenerator->getHtmlMenu($html, 1, 6, $renderer);

            echo $list;
          ?>
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
