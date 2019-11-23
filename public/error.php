<!DOCTYPE html>
<html>
<head>
  <title>error</title>
</head>
<body>
  <?php
    if ( isset( $_SERVER['REDIRECT_STATUS'] ) )
      echo 'Error:' , $_SERVER['REDIRECT_STATUS'];
    else
      echo 'Error:' , '503';
  ?>
</body>
</html>
