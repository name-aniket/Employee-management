<?php
	class Login {
        public static $dbConnection = null;
        const Relation = 'Login';

        /**
         * 
         * 
         */
        public static function factoryCreateConnection() {
            include_once '../../IWP/config/core.php';
            include_once '../../IWP/config/database.php';

            $dbObject = new Database($dbconfig['username'], $dbconfig['password']);
            
            if (Login::$dbConnection === null){
                Login::$dbConnection = $dbObject->getConnection();
            }
        }
        
        /**
         * 
         * 
         */
        public static function authenticate() {
            /**
             * Create connection
             */
            Login::factoryCreateConnection();

            /**
             * Validate input
             */
            $username = htmlspecialchars(stripslashes($_POST['username']));
            $password = htmlspecialchars(stripslashes($_POST['passwd']));

            if (!filter_var($username, FILTER_VALIDATE_EMAIL)) { 
                return false;
            }

            
            return true;
        }
    }

?>
