<?php
  $page_title = 'Entrar no Console';

  require 'assets/templates/head.php';
?>

  <!-- Page's Contents -->
  <main id="console" class="my-5">
    <div class="container">
      <form id="adminLogin" class="p-3 border align-middle">
        <div class="form-row align-items-center">
          <div class="col-12">
            <div class="form-group">
              <label for="inputEmail">E-mail</label>
              <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="bob@unipampa.edu.br" required>
              <small id="emailHelp" class="form-text text-muted text-truncate">Use um e-mail de administrador.</small>
            </div>
          </div>
        </div>
        <div class="form-row align-items-center">
          <div class="col-12">
            <div class="form-group">
              <label for="inputPassword">Senha</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Senha" required>
            </div>
          </div>
        </div>
        <button id="submitLogin" class="btn btn-primary" type="button">Entrar</button>
      </form>
    </div>
  </main>

<?php
  require 'assets/templates/foot.php';
