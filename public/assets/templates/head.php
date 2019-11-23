<?php
  function markdown2html($markdown) {
    if ($markdown !== '') {
      $markupFixer = new TOC\MarkupFixer();
      $html = Parsedown::instance()->text($markdown);

      // add style class to all headers
      for ($i = 1; $i <= 6; $i++)
        $html = str_replace("<h${i}>", "<h${i} class=\"title-anchor\">", $html);

      return $markupFixer->fix($html);
    }

    return '';
  }

  function header2toc($html) {
    $tocGenerator = new TOC\TocGenerator();
    return ($html !== '') ? $tocGenerator->getHtmlMenu($html, 1, 6) : '';
  }

  // verify page language
  if (isset($_COOKIE['lang'])) {
    if (!isset( $lang))
      $lang = $_COOKIE['lang'];
  }
  else {
    if (!isset($lang))
      $lang = 'pt';

    setcookie('lang', $lang, time() + 60*60*24*30, '/');
  }

  // connect to the database
  $manager = new MongoDB\Driver\Manager(getenv('MONGODB_URI'));
  $stats = new MongoDB\Driver\Command(["dbstats" => 1]);
  $res = $manager->executeCommand("testdb", $stats);
    
  $stats = current($res->toArray());

  print_r($stats);
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
  <link rel="stylesheet" href=<?php echo "https://${_SERVER['SERVER_NAME']}/assets/css/styles.css"; ?>>

  <?php
    if (isset($page_title))
      echo "<title>$page_title | Programa de Pós-Graduação em Engenharia de Software (PPGES)</title>";
    else
      echo '<title>Programa de Pós-Graduação em Engenharia de Software (PPGES)</title>';
  ?>
</head>
<body>
