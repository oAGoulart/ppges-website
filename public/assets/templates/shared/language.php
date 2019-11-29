<?php
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