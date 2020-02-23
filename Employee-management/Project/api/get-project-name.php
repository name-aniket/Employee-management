<?php

header("Access-Control-Allow-Origin: http://localhost/IWP/Project/views");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

/**
 * Create Connection
 */
include_once '../Project.php';

Project::factoryCreateConnection();

echo json_encode(Project::get_project_name());
