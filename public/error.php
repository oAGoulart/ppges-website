<?php
  // get headers response code
  function getResponseCode( $headers )
  {
    foreach( $headers as $k => $v ) {
      $t = explode( ':', $v, 2 );

      $head[] = $v;
      if( preg_match( "#HTTP/[0-9\.]+\s+([0-9]+)#", $v, $out ) )
        return intval($out[1]);
    }

    return 503;
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>error</title>
</head>
<body>
  <?php echo 'Error:' , getResponseCode($http_response_header) ?>

</body>
</html>
