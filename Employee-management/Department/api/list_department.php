<?php

  header("Access-Control-Allow-Origin: http://localhost/IWP/");
  header("Content-Type: application/json; charset=UTF-8");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Max-Age: 3600");
  header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

  include_once $_SERVER['DOCUMENT_ROOT'].'/IWP/config/database.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/IWP/config/core.php';
  include_once $_SERVER['DOCUMENT_ROOT'].'/IWP/Department/Department.php';

  $database   = new Database($dbconfig['username'], $dbconfig['password']);

  $department = new Department($database->getConnection());

  $result     = $department->getDepartment();

  if (!empty($result)) {
      http_response_code(200);
      echo json_encode($result);
  }else{
      http_response_code(401);
      echo json_encode(array(
        'message' => 'Unable to Fetch'
      ));
  }
?>
