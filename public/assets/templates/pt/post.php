  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container">
      <div class="row">
        <!-- Discover Links -->
        <div class="col-sm-push-3">
          <ul class="list-group discover-links text-wrap">
            <li class="list-group-item text-uppercase">Índice</li>
            <?php echo header2toc($html) ?>
          </ul>
          <?php require 'discover_links.php'; ?>
        </div>

        <!-- Main Text Body -->
        <div class="col-sm-pull-9">
          <?php echo $html; ?>
        </div>
      </div>
    </div>
  </main>
  