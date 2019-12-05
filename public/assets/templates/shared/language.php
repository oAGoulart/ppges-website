<?php
  // Verify page language
  if (isset($_COOKIE['lang'])) {
    if (!isset($lang)) {
      $lang = $_COOKIE['lang'];
    }

    $lang = substr($lang, 0, 2);
  }
  else {
    if (!isset($lang)) {
      $lang = 'pt';
    } else {
      $lang = substr($lang, 0, 2);
    }

    setcookie('lang', $lang, time() + 60*60*24*30, '/');
  }
