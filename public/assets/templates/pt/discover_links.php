<ul class="list-group discover-links">
  <li class="list-group-item text-uppercase">Descubra Mais</li>
  <?php
    $cursor = filter_search([], [], $database, 'discover_links', $manager);
    $discover_links = $cursor->setTypeMap(['root' => 'array', 'document' => 'array', 'array' => 'array']);

    $items = array_rand($discover_links, 4);

    for ($i = 0; $i < 4; $i++) {
      echo '<li class="list-group-item">';

      printf("<a href=\"${base_url}%s\" title=\"%s\">%s</a>", $discover_links[$items[$i]]['permalink'], $discover_links[$items[$i]]['name'], $discover_links[$items[$i]]['name']);

      echo '</li>';
    }
  ?>
</ul>