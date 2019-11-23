<?php include 'assets/templates/head.php'; ?>
  <?php include "assets/templates/$lang/non_sticky_nav.php"; ?>

  <?php include "assets/templates/$lang/sticky_header.php"; ?>

  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container recent-feed">
      <div class="row">
        <!-- Main Text Body -->
        <div class="col-sm-9">
          <p>
            <?php
              require_once 'vendor/autoload.php';
              
              $file = file_get_contents('assets/markdown/sobre.md');
              echo Parsedown::instance()->text($file);
            ?>
          </p>
        </div>

        <!-- Discover Links -->
        <div class="col-sm-3">
          <ul class="list-group discover-links">
            <li class="list-group-item text-uppercase">Índice</li>
            <li class="list-group-item">
              <a href="#apresentacao">Apresentação</a>
            </li>
            <li class="list-group-item">
              <a href="#concentracao">Área de Concentração</a>
            </li>
            <li class="list-group-item">
              <a href="#pesquisa">Linhas de Pesquisa</a>
            </li>
            <li class="list-group-item">
              <a href="#objetivos">Objetivos</a>
            </li>
            <li class="list-group-item">
              <a href="#publico">Público Alvo Preferencial</a>
            </li>
            <li class="list-group-item">
              <a href="#candidato">Perfil do Candidato</a>
            </li>
            <li class="list-group-item">
              <a href="#egresso">Perfil do Egresso</a>
            </li>
            <li class="list-group-item">
              <a href="#oferta">Esquema de Oferta do Curso</a>
            </li>
            <li class="list-group-item">
              <a href="#responsabilidades">Responsabilidades do Aluno e do Orientador</a>
            </li>
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

  <?php include "assets/templates/$lang/footer.php"; ?>

<?php include 'assets/templates/foot.php';
