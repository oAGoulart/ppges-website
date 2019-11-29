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
