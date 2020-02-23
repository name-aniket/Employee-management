<?php
  date_default_timezone_set('Asia/Kolkata');

  $config =  array(
    'base_url' => 'http://localhost/IWP/'
  );

  $dbconfig = array(
    'dbname'   => 'dbProject2020',
    'username' => 'aniket',
    'password' => 'thinkit',
    'hostname' => 'localhost'
  );

  $jwt = array(
    'key'      => 'example_key',
    'iss'      => 'http://example.org',
    'aud'      => 'http://example.com',
    'iat'      =>  1356999524,
    'nbf'      =>  1357000000
  );
?>
