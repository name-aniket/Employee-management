<?php
header("Access-Control-Allow-Origin: http://localhost/IWP/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/Employee/Employee.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/config/core.php';

$database   = new Database($dbconfig['username'], $dbconfig['password']);
$connection = $database->getConnection();
$emp   = new Employee($connection);

echo json_encode(Employee::getEmployee());