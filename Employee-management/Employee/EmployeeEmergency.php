<?php
  class EmployeeEmergency{
      private $emp_id = null;
      private $name = null;
      private $emp_relationship = null;
      private $phone = null;
      private $dbConnection = null;
      const $RELATION = "EmployeeEmergency";

      /*
      *
      *
      */
      public function __construct($conn, $emp_id) {
        $this->dbConnection = $conn;
        $this->emp_id = $emp_id;
      }

  }
?>
