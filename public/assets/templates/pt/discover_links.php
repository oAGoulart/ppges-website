<ul class="list-group discover-links text-wrap">
  <li class="list-group-item text-uppercase">Descubra Mais</li>
  <?php
    $links = filter_search([], [], $database, 'discover_links', $manager);
    $discover_links = $links->toArray();

    $items = array_rand($discover_links, 4);

    for ($i = 0; $i < 4; $i++) {
      echo '<li class="list-group-item">';

      printf('<a href="%s/%s" title="%s">%s</a>',
             $base_url,
             $discover_links[$items[$i]]->permalink,
             $discover_links[$items[$i]]->name,
             $discover_links[$items[$i]]->name);

      echo '</li>';
    }
  ?>
</ul>