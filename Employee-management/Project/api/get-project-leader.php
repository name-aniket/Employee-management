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
     * Create a connection
     */
    Project::factoryCreateConnection();

    /**
     * Get the list of project leader
     */
    echo json_encode(Project::getProjectLeader());
?>