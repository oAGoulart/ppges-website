<?php
  require 'assets/templates/head.php';

  if (isset($_SERVER['REDIRECT_STATUS'])) {
    echo 'Error:', $_SERVER['REDIRECT_STATUS'];
  } else {
    echo 'Error:', '503';
  }

  require 'assets/templates/foot.php';
