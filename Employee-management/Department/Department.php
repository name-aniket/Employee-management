<?php
    class Department {
        private $deptId   = null;
        private $deptName = null;
        private $deptEstb = null;
        private $deptHOD  = null;
        private $dbconn   = null;
        const Relation    = "Department";

        /*
        *
        *
        */
        public function __construct($conn) {
          $this->dbconn = $conn;
        }

        /*
        *
        *
        */
        public function getDepartment() {
          try {
              $stmt   = $this->dbconn->prepare("SELECT deptId, deptName FROM " . Department::Relation);
              $stmt->execute();
              $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
          } catch (\Exception $e) {
              return False;
          }
          return $result;
        }
    }
?>
