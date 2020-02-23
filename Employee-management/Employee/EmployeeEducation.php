<?php
    class EmployeeEducation {
        private $emp_id         = null;
        private $institute_name = null;
        private $subject        = null;
        private $degree         = null;
        private $startDate      = null;
        private $completeDate   = null;
        private $percentage     = null;
        private $dbConnection   = null;
        const $RELATION         = "EmployeeEducation";

        /*
        *
        *
        */
        public function __construct($conn, $emp_id) {
            $this->dbConnection = $conn;
            $this->$emp_id = $emp_id;
        }
    }
?>
