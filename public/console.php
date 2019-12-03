<?php
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

    if (isset($user)) {
      echo '<h1>Hello' . $user . '</h1>';
    } else {
      echo '<h1>You should not be here</h1>';
    }
  }
