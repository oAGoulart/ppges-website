<?php
  $page_title = 'Entrar no Console';

  require_once '../vendor/autoload.php';
  require 'assets/templates/head.php';

  if (isset($_POST['token']) && isset($_POST['apiKey'])) {
    $api_url = "https://www.googleapis.com/identitytoolkit/v3/relyingparty/verifyCustomToken?key=${_POST['apiKey']}";

    $data = array(
      'returnSecureToken' => TRUE,
      'token' => $_POST['token']
    );

    $options = array(
      'http' => array(
        'method' => 'POST',
        'content' => json_encode($data),
        'header' => "Content-Type: application/json\r\n" . "Charset: UTF-8\r\n" .  "Accept: application/json\r\n"
      )
    );

    $context  = stream_context_create($options);
    $result = file_get_contents($api_url, FALSE, $context);
    $user = json_decode($result);
  }
?>

  <!-- Page's Contents -->
  <main class="my-5">
    <div class="container">
      <?php
        if (isset($user))) {
          echo 'Hello' . $user;
        } else {
          echo '<form id="adminLogin" class="p-3 border align-middle">
                  <div class="form-row align-items-center">
                    <div class="col-auto">
                      <div class="form-group">
                        <label for="inputEmail">E-mail</label>
                        <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="bob@unipampa.edu.br" required>
                        <small id="emailHelp" class="form-text text-muted">Use um e-mail de administrador.</small>
                      </div>
                    </div>
                  </div>
                  <div class="form-row align-items-center">
                    <div class="col-auto">
                      <div class="form-group">
                        <label for="inputPassword">Senha</label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Senha" required>
                      </div>
                    </div>
                  </div>
                  <button id="submitLogin" class="btn btn-primary" type="submit">Entrar</button>
                </form>';
        }
      ?>
    </div>
  </main>

<?php
  require 'assets/templates/foot.php';
