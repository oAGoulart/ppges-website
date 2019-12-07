<?php
  $width = 1920;
  $height = 1080;

  $img = imagecreatetruecolor($width, $height);

  imagealphablending($img, false);
  imagesavealpha($img, true);

  $transparency = imagecolorallocatealpha($img, 255,255,255, 127);
  $white = imagecolorallocate($img, 255,255,255);
  imagefilledrectangle($img, 0, 0, $width, $height, $transparency);

  $font = (isset($_GET['font'])) ? "assets/fonts/${_GET['font']}.ttf" : 'assets/fonts/roboto/Roboto-Black.ttf';
  $font_size = (isset($_GET['fontSize'])) ? $_GET['fontSize'] : 120;
  $text = (isset($_GET['text'])) ? $_GET['text'] : 'NO IMAGE FOUND';

  $text_size = imagettfbbox($font_size, 0, $font, $text);
  $text_width = $text_size[2] - $text_size[0];
  $text_height = $text_size[7] - $text_size[1];

  $text_pos_x = ($width / 2) - ($text_width / 2);
  $text_pos_y = ($height / 2) - ($text_height / 2);

  imagealphablending($img, true);
  imagettftext($img, $font_size, 0, $text_pos_x, $text_pos_y, $white, $font, $text);

  header("Content-Type: image/png");
  imagepng($img);
