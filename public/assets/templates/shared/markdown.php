<?php
  function markdown2html($markdown)
  {
    if ($markdown !== '') {
      $markupFixer = new TOC\MarkupFixer();
      $html = Parsedown::instance()->text($markdown);

      // Add style class to all headers
      for ($i = 1; $i <= 6; $i++) {
        $html = str_replace("<h${i}>", "<h${i} class=\"title-anchor\">", $html);
      }

      return $markupFixer->fix($html);
    }

    return '';
  }

  function header2toc($html)
  {
    $tocGenerator = new TOC\TocGenerator();
    return ($html !== '') ? $tocGenerator->getHtmlMenu($html, 1, 6) : '';
  }

  function change_page_number($base_url, $curr_number, $new_number) {
    $request = $base_url . $_SERVER['REQUEST_URI'];
    return preg_replace("/\x26?p=[0-9]*/i", '', $request) . "\x26p=${new_number}";
  }

  function base_url() {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' 
                 || $_SERVER['SERVER_PORT'] == 443) ? 'https://' : 'http://';

    return $protocol . $_SERVER['HTTP_HOST'];
  }

  $base_url = 'https://' . $_SERVER['HTTP_HOST'];
  $img_gen = $base_url . '/images?text=';
