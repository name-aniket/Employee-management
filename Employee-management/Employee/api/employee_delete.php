<?php

//header("Access-Control-Allow-Origin: http://localhost/IWP/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/Employee/Employee.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/config/core.php';

if (isset($_POST['emp_id']) && !empty($_POST['emp_id'])) {
    
    /**
     * Validate and sanitaize the input.
     */
    $emp_id = base64_decode(htmlspecialchars(stripslashes($_POST['emp_id'])));
    
    /**
     * Create a database connection
     */
    $dbObject = new Database($dbconfig['username'], $dbconfig['password']);
    $conn = $dbObject->getConnection();

    /**
     * Create an Employee object 
     */
    $employee = new Employee($conn);
    $employee->emp_id = $emp_id;
    $msg = "";

    if ($employee->deleteEmployee()) {
        http_response_code(200);
        $msg = "Deleted Successfully";
    }else{
        http_response_code(401);
        $msg = "Something went wrong!";
    }
    echo json_encode(array(
        'Message' => $msg
    ));
}
