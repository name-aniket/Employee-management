<?php
  class EmployeeFamily {

      private $emp_id = null;
      private $familyMemberName  = null;
      private $emp_relationship  = null;
      private $familyMemberDOB   = null;
      private $familyMemberPhone = null;
      private $dbConnection      = null;
      const $RELATION = "EmployeeFamily";

      public function __construct($conn, $emp_id){
        $this->dbConnection = $conn;
        $this->emp_id = $emp_id;
      }

      

}

?>
