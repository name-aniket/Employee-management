<?php
  header("Access-Control-Allow-Origin: http://localhost/IWP/");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
  include_once './Login.php';
  
  echo json_encode(Login::authenticate());
?>
