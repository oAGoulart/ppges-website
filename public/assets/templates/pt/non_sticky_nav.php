<!-- Non-Sticky Navbar -->
  <nav id="nav">
    <div class="container text-uppercase font-weight-bold">
      <ul class="nav justify-content-end">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lang</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Português</a>
            <a class="dropdown-item" href=<?php echo "https://${_SERVER['SERVER_NAME']}/en"; ?>>
              English
            </a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://unipampa.edu.br/portal/">Portal Unipampa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href=<?php echo "https://${_SERVER['SERVER_NAME']}/contato"; ?>>Contato</a>
        </li>
      </ul>
    </div>
  </nav>
