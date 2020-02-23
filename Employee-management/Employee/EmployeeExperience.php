<?php
    class EmployeeExperience {
        private $emp_id         = null;
        private $company_name   = null;
        private $location       = null;
        private $jobPosition    = null;
        private $periodFrom     = null;
        private $periodTo       = null;
        private $dbConnection   = null;
        const $RELATION         = "EmployeeExperience";

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
