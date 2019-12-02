<?php
  $page_title = 'Entrar no Console';

  require 'assets/templates/head.php';
?>

  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container">
      <form id="adminLogin">
        <div class="form-group">
          <label for="inputEmail">E-mail</label>
          <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="bob@unipampa.edu.br">
          <small id="emailHelp" class="form-text text-muted">Use um e-mail de administrador.</small>
        </div>
        <div class="form-group">
          <label for="inputPassword">Senha</label>
          <input type="password" class="form-control" id="inputPassword" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>
    </div>
  </main>

<?php
  require 'assets/templates/foot.php';