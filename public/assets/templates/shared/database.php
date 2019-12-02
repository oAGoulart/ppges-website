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

      $count = 0;

      // count number of documents returned
      foreach ($cursor as $document) {
        $count++;
      }
      
      return $count;
    }

    return 0;
  }

  function query_search($query, $options, $database, $collection, $manager) {
    if ($query != '') {
      $filter = ['$text' => ['$search' => "${query}"]];

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
    $collection = 'posts';
  }
  catch(MongoDB\Driver\Exception $e) {
    header("HTTP/1.1 500 Internal Server Error");
    throw $e;
  }
