<?php
  require 'shared/markdown.php';
  require 'shared/language.php';
  require 'shared/database.php';
?>

<!DOCTYPE html>
<html lang=<?php echo $lang ?>>
<head>
  <!-- Meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Fonts and Material Design Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Roboto:500,700&display=swap" rel="stylesheet">

  <!-- Default Styles CSS -->
  <link rel="stylesheet" href="<?php echo $base_url, '/assets/css/styles.css'; ?>">

  <?php
    if (isset($page_title)) {
      echo '<title>', $page_title, ' | Programa de Pós-Graduação em Engenharia de Software (PPGES)</title>';
    } else {
      echo '<title>Programa de Pós-Graduação em Engenharia de Software (PPGES)</title>';
    }
  ?>
</head>
<body>
