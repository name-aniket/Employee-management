<?php
    /**
     * Include the class path
     */
    include_once '../Project.php';
    
    echo json_encode(Project::getProjectList());
?>