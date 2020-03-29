<?php
class Login
{
    public static $dbConnection = null;
    const Relation = 'Login';

    /**
     * 
     * 
     */
    public static function factoryCreateConnection()
    {
        include_once '../../IWP/config/core.php';
        include_once '../../IWP/config/database.php';

        $dbObject = new Database($dbconfig['username'], $dbconfig['password']);

        if (Login::$dbConnection === null) {
            Login::$dbConnection = $dbObject->getConnection();
        }
    }

    /**
     * 
     * 
     */
    public static function authenticate()
    {
        /**
         * Create connection
         */
        Login::factoryCreateConnection();

        /**
         * Validate input
         */
        $username = htmlspecialchars(stripslashes($_POST['username']));
        $password = htmlspecialchars(stripslashes($_POST['passwd']));

        /**
         * 
         */
        if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
            return array(
                'Message' => "Invalid email",
                'Status' => false
            );
        }

        /**
         *  Get password form the database.
         *  
         */
        $stmt = Login::$dbConnection->prepare(
            'SELECT password, user_type, emp_id, emp_profilePhoto, emp_fname, emp_lname FROM Login L, Employee E WHERE  L.email = ? AND E.emp_email = L.email'
        );

        /**
         * Execute query
         */
        $flag = $stmt->execute(array(
            $username
        ));

        /**
         * If password query doesn't run successfully
         */
        if (!$flag) {
            return array(
                'Message' => "Error",
                'Status' => false
            );
        }

        /**
         * Match the password
         */
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($password == $row['password']) {
            if ($row['user_type'] == 'HR') {
                $location = 'HR';
            } else if ($row['user_type'] == 'EMP') {
                $location = 'EMP';
            }

            session_start();

            $_SESSION['user_detail'] = array(
                'emp_id' => $row['emp_id'],
                'emp_profilePhoto' => $row['emp_profilePhoto'],
                'emp_fname' => $row['emp_fname'],
                'emp_lname' => $row['emp_lname'],
                'email' => $username,
                'password' => $password
            );

            return array(
                'Message' => $location,
                'Status' => true
            );

        } else {
            return array(
                'Message' => "Invalid Password or Username",
                'Status' => false
            );
        }
    }
}
