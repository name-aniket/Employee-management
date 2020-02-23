<?php
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    /**
     * Include the class path
     */
    include_once '../Project.php';

    /**
     * Create connection
     */
    Project::factoryCreateConnection();

    /**
     * Insert record
     */
    if (Project::insertProject()) {
        http_response_code(200);
        echo json_encode(array(
            'Status' => 'Ok',
            'Message' => 'Project Created Successfully'
        ));
    }else{
        http_response_code(400);
        echo json_encode(array(
            'Status' => 'Error',
            'Message' => 'Error Occures'
        ));
    }
?>