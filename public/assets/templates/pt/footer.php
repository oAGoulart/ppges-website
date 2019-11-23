  <!-- Footer -->
  <footer class="py-5">
    <div class="container text-uppercase font-weight-bold">
      <div class="row align-items-center">
        <!-- Unipampa Logo -->
        <div class="col-sm-9">
          <a href="https://unipampa.edu.br/portal/">
            <img alt="Unipampa" id="unipampa" src=<?php echo "https://${_SERVER['SERVER_NAME']}/assets/images/unipampa.jpg"; ?>>
          </a>
        </div>

        <!-- Links -->
        <div class="col-sm-3">
          <ul class="list-group">
            <li class="list-group-item p-1">
              <a class="footer-link" href=<?php echo "https://${_SERVER['SERVER_NAME']}/ouvidoria"; ?>>
                Ouvidoria
              </a>
            </li>
            <li class="list-group-item p-1">
              <a class="footer-link" href=<?php echo "https://${_SERVER['SERVER_NAME']}/identidade"; ?>>
                Identidade Visual
              </a>
            </li>
            <li class="list-group-item p-1">
              <a class="footer-link" href=<?php echo "https://${_SERVER['SERVER_NAME']}/institucional"; ?>>
                Institucional
              </a>
            </li>
            <li class="list-group-item p-1">
              <a class="footer-link" href=<?php echo "https://${_SERVER['SERVER_NAME']}/mapa"; ?>>
                Mapa do Site
              </a>
            </li>
          </ul>
        </div>
      </div>

      <div class="row text-center mt-5">
        <!-- Copyright Statement -->
        <div class="col-xl-12">
          <p>Todos os direitos reservados &copy; <?php echo date('Y'); ?> Unipampa</p>
        </div>
      </div>
    </div>
  </footer>
