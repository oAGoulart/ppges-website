  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container">
      <div class="row">
        <p>
          <?php
            $path_link = explode($_SERVER['REQUEST_URI']);
            $next_link = '/';
            $path_size = count($path_link);

            foreach ($path_link as $i => $path) {
              if ($i == 0) {
                $path = 'Início';
              }

              if ($i < $path_size-1) {
                echo '<a href="', $next_link, '">', $path, '</a>';
                echo '<span> &#9473;&#62; </span>';

                $next_link .= $path_link[$i+1] . '/';
              } else {
                echo '<a href="', $next_link, '">', $path, '</a>';
              }
            }
          ?>
        </p>
      </div>
      <div class="row flex-md-row-reverse">
        <!-- Discover Links -->
        <div class="col-md-3">
          <ul class="list-group discover-links text-wrap">
            <li class="list-group-item text-uppercase">Índice</li>
            <?php echo header2toc($html) ?>
          </ul>
          <?php require 'discover_links.php'; ?>
        </div>
        
        <!-- Main Text Body -->
        <div class="col-md-9">
          <?php echo $html; ?>
        </div>
      </div>
    </div>
  </main>
  