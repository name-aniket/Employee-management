<?php
    class Designation {
        private $desgId;
        private $desgName;
        private $desgStatus = 'Active'; 
        public static $dbConnection;
        const Relation = "Designation";

        /**
         * Constructor
         */
        public function __construct($conn)
        {
            Designation::$dbConnection = $conn;
        }

        /**
         * Destructor
         */
        public function __destruct()
        {
            Designation::$dbConnection = null;
        }

        /**
         * Returns the list of all the active Designation.
         */
        public function getDesignation()
        {
            try {
                $stmt   = Designation::$dbConnection->prepare("SELECT desgId, desgName FROM " . Designation::Relation." WHERE desgStatus = 'Active'");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (\Exception $e) {
                return False;
            }
            return $result;
        }

        
    }
