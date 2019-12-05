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
          <?php require 'discover_links.php'; ?>
        </div>
      </div>
    </div>
  </main>
  