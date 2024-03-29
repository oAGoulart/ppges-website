<?php
  $page_title = 'Entrar no Console';

  require 'assets/templates/head.php';
?>

  <!-- Page's Contents -->
  <main class="my-5">
    <div id="logoutCard" class="container d-none">
      <button id="adminLogout" class="btn btn-primary" type="button">Sair</button>
    </div>
    <div id="loginCard" class="container">
      <img id="loginLogo" src="assets/images/logo.png" class="img-fluid p-5 border bg-light" alt="PPGES">
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
        <button id="submitLogin" class="btn btn-primary" type="button">
          <span id="submitLoad" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true">
          </span>
          Entrar
        </button>
      </form>
    </div>
    <div id="console" class="container">
    </div>
  </main>

<?php
  require 'assets/templates/foot.php';
