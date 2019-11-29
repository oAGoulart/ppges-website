<?php
  // connect to the database
  try {
    $manager = new MongoDB\Driver\Manager(getenv('MONGODB_URI'));
    $database = 'sample_training';
  }
  catch(MongoDB\Driver\Exception $e) {
    header("HTTP/1.1 500 Internal Server Error");
    throw $e;
  }
