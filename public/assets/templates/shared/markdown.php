<?php
  function markdown2html($markdown)
  {
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

  function header2toc($html)
  {
    $tocGenerator = new TOC\TocGenerator();
    return ($html !== '') ? $tocGenerator->getHtmlMenu($html, 1, 6) : '';
  }

  function change_page_number($base_url, $curr_number, $new_number) {
    $request = $base_url . '/' . $_SERVER['REQUEST_URI'];
    return str_replace("p=${curr_number}", "p=${new_number}", $request);
  }

  // site base url
  $base_url = "https://${_SERVER['SERVER_NAME']}";
