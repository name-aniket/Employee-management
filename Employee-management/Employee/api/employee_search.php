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

/**
 * Validate and sanatize input
 */
$emp_id   = htmlspecialchars(strip_tags($_POST['emp_id']));
$emp_name = htmlspecialchars(strip_tags($_POST['emp_name']));
$emp_desg = htmlspecialchars(strip_tags($_POST['emp_desg']));

/**
 * Search Condition
 */
if (!empty($emp_id)) {
    /**
     * Search by Employee Id
     */
    echo json_encode(Employee::searchByID($emp_id));
} else {
    /**
     * If employee id not provided
     */
    if (!empty($emp_name) && !empty($emp_desg)) {
        if ($emp_desg != "Select Designation") {

            /**
             * Search by employee name and designation
             * 
             */
            echo json_encode(Employee::searchByNameDesignation($emp_name, $emp_desg));
        } else {
            /**
             * Search by name only.
             */
        }
    } else {
        /**
         * Search by Designation only.
         */
        echo json_encode(Employee::searchByDesgination($emp_desg));
    }
}
