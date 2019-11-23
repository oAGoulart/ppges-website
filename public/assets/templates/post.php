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
              $discover_links = array(
                array('url' => "https://${_SERVER['SERVER_NAME']}/coordenacao", 'name'=>'Coordenação'),
                array('url' => "https://${_SERVER['SERVER_NAME']}/professores", 'name'=>'Professores Orientadores'),
                array('url' => "https://${_SERVER['SERVER_NAME']}/alunos", 'name'=>'Alunos'),
                array('url' => "https://${_SERVER['SERVER_NAME']}/seminarios", 'name'=>'Ciclo de Seminários e Palestras')
              );

              $items = array_rand($discover_links, 4);

              for ($i = 0; $i < 4; $i++) {
                echo '<li class="list-group-item">';

                printf('<a href="%s" title="%s">%s</a>', $discover_links[$items[$i]]['url'], $discover_links[$items[$i]]['name'], $discover_links[$items[$i]]['name']);

                echo '</li>';
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </main>
  