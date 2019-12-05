<?php
  if ($pages > 1) {
    echo '<nav id="pagination"><ul class="pagination justify-content-center">';

    if ($page_number == 1) {
      echo '<li class="page-item disabled"><a class="page-link" aria-hidden="true">&laquo;</a></li>';
    } else {
      $request = change_page_number($base_url, $page_number, $page_number - 1);
      echo "<li class=\"page-item\"><a class=\"page-link\" href=\"${request}\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
    }

    $max = ($pages - $page_number <= 4) ? $pages : $page_number + 4;

    for ($i = $page_number; $i <= $max; $i++) {
      if ($i == $page_number) {
        echo "<li class=\"page-item active\"><span class=\"page-link\">${i}</span></li>";
      } else {
        $request = change_page_number($base_url, $page_number, $i);
        echo "<li class=\"page-item\"><a class=\"page-link\" href=\"${request}\">${i}</a></li>";
      }
    }

    if ($page_number == $pages) {
      echo '<li class="page-item disabled"><a class="page-link" aria-hidden="true">&raquo;</a></li>';
    } else {
      $request = change_page_number($base_url, $page_number, $page_number + 1);
      echo "<li class=\"page-item\"><a class=\"page-link\" href=\"${request}\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
    }
          
    echo '</ul></nav>';
  }
  