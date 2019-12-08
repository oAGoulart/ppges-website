<?php
  $prev_page = $page_number - 1;
  $next_page = $page_number + 1;

  if ($pages > 1) {
    echo '<nav id="pagination"><ul class="pagination justify-content-center">';

    if ($page_number > 1) {
      $request = change_page_number($base_url, $page_number, 1);
      echo '<li class="page-item"><a class="page-link" href="', $request, '">Início</a></li>';
    }

    printf(
      '<li class="page-item %s"><a class="page-link" href="%s">Anterior</a></li>',
      ($page_number <= 1) ? 'disabled' : '',
      ($page_number > 1) ? change_page_number($base_url, $page_number, $prev_page) : '#'
    );

    if ($pages <= 10) {
      for ($i = 1; $i <= $pages; $i++) {
        if ($i == $page_number) {
          echo '<li class="page-item active"><span class="page-link">', $i, '</span></li>';
        } else {
          $request = change_page_number($base_url, $page_number, $i);
          echo '<li class="page-item"><a class="page-link" href="', $request, '">', $i, '</a></li>';
        }
      }
    } else {
      if ($page_number <= 4) {
        for ($i = 1; $i <= 8; $i++) {
          if ($i == $page_number) {
            echo '<li class="page-item active"><span class="page-link">', $i, '</span></li>';
          } else {
            $request = change_page_number($base_url, $page_number, $i);
            echo '<li class="page-item"><a class="page-link" href="', $request, '">', $i, '</a></li>';
          }
        }
        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
        printf(
          '<li class="page-item"><a class="page-link" href="%s">%d</a></li>',
          change_page_number($base_url, $page_number, $pages - 1),
          $pages - 1
        );
        printf(
          '<li class="page-item"><a class="page-link" href="%s">%d</a></li>',
          change_page_number($base_url, $page_number, $pages),
          $pages
        );
      } else if ($page_number < $pages - 4) {
        printf(
          '<li class="page-item"><a class="page-link" href="%s">1</a></li>',
          change_page_number($base_url, $page_number, 1),
        );
        printf(
          '<li class="page-item"><a class="page-link" href="%s">2</a></li>',
          change_page_number($base_url, $page_number, 2),
        );
        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
        for ($i = $page_number - 2; $i <= $page_number + 2; $i++) {
          if ($i == $page_number) {
            echo '<li class="page-item active"><span class="page-link">', $i, '</span></li>';
          } else {
            $request = change_page_number($base_url, $page_number, $i);
            echo '<li class="page-item"><a class="page-link" href="', $request, '">', $i, '</a></li>';
          }
        }
        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
        printf(
          '<li class="page-item"><a class="page-link" href="%s">%d</a></li>',
          change_page_number($base_url, $page_number, $pages - 1),
          $pages - 1
        );
        printf(
          '<li class="page-item"><a class="page-link" href="%s">%d</a></li>',
          change_page_number($base_url, $page_number, $pages),
          $pages
        );
      } else {
        printf(
          '<li class="page-item"><a class="page-link" href="%s">1</a></li>',
          change_page_number($base_url, $page_number, 1),
        );
        printf(
          '<li class="page-item"><a class="page-link" href="%s">2</a></li>',
          change_page_number($base_url, $page_number, 2),
        );
        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
        for ($i = $pages - 6; $i <= $pages; $i++) {
          if ($i == $page_number) {
            echo '<li class="page-item active"><span class="page-link">', $i, '</span></li>';
          } else {
            $request = change_page_number($base_url, $page_number, $i);
            echo '<li class="page-item"><a class="page-link" href="', $request, '">', $i, '</a></li>';
          }
        }
      }
    }

    printf(
      '<li class="page-item %s"><a class="page-link" href="%s">Próxima</a></li>',
      ($page_number >= $pages) ? 'disabled' : '',
      ($page_number < $pages) ? change_page_number($base_url, $page_number, $next_page) : '#'
    );

    if ($page_number < $pages) {
      $request = change_page_number($base_url, $page_number, $pages);
      echo '<li class="page-item"><a class="page-link" href="', $request, '">Última</a></li>';
    }
          
    echo '</ul></nav>';
  }
  