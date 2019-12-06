<?php
  function filter_search($filter, $options, $database, $collection, $manager) {
    if (!is_null($filter)) {
      $q = new MongoDB\Driver\Query($filter, $options);
      $cursor = $manager->executeQuery("${database}.${collection}", $q);

      return $cursor;
    }

    return NULL;
  }

  function query_search($query, $options, $database, $collection, $manager) {
    if ($query != '') {
      $filter = ['$text' => ['$search' => "${query}"]];

      return filter_search($filter, $options, $database, $collection, $manager);
    }

    return NULL;
  }

  function filter_count($filter, $database, $collection, $manager)
  {
    if ($filter != []) {
      $options = [
        'allowPartialResults' => true,
        'projection' => ['_id' => 1]
      ];

      $cursor = filter_search($filter, $options, $database, $collection, $manager);

      // Count number of documents returned
      $count = 0;
      foreach ($cursor as $document) {
        $count++;
      }
      
      return $count;
    }

    return 0;
  }

  function query_count($query, $database, $collection, $manager)
  {
    if ($query != '') {
      $filter = ['$text' => ['$search' => "${query}"]];

      return filter_count($filter, $options, $database, $collection, $manager);
    }

    return 0;
  }

  // Connect to the database
  try {
    $manager = new MongoDB\Driver\Manager(getenv('MONGODB_URI'));

    $database = 'public';
    $collection = 'posts';
  }
  catch(MongoDB\Driver\Exception $e) {
    header('HTTP/1.1 500 Internal Server Error');
    throw $e;
  }
