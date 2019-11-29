<?php
  function query_count($query, $database, $collection, $manager)
  {
    if ($query != '') {
      $filter = ['$text' => ['$search' => $query]];
      $options = [
        'allowPartialResults' => true,
        'projection' => ['_id' => 1]
      ];

      $q = new MongoDB\Driver\Query($filter, $options);
      $cursor = $manager->executeQuery("${database}.${collection}", $q);

      return count($cursor);
    }

    return 0;
  }

  function query_search($query, $page_size, $page_number, $projection, $database, $collection, $manager) {
    if ($query != '') {
      $filter = ['$text' => ['$search' => $query]];
      $options = [
        'allowPartialResults' => true,
        'limit' => $page_size,
        'skip' => ($page_number - 1) * $page_size,
        'projection' => $projection
      ];

      $q = new MongoDB\Driver\Query($filter, $options);
      $cursor = $manager->executeQuery("${database}.${collection}", $q);

      return $cursor;
    }

    return NULL;
  }
  
  // connect to the database
  try {
    $manager = new MongoDB\Driver\Manager(getenv('MONGODB_URI'));
    $database = 'sample_training';
  }
  catch(MongoDB\Driver\Exception $e) {
    header("HTTP/1.1 500 Internal Server Error");
    throw $e;
  }
