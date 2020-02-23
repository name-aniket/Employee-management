<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/IWP/vendor/autoload.php';

class Employee
{
  public $emp_id = null;
  public $emp_fname = null;
  public $emp_mname = null;
  public $emp_lname = null;
  public $emp_email = null;
  public $emp_dob = null;
  public $emp_dateOfJoining = null;
  public $emp_address = null;
  public $emp_gender = null;
  public $emp_reportsTo = null;
  public $emp_phone = null;
  public $emp_profilePhoto = null;
  public $emp_maritalStatus = null;
  public $emp_bankName = null;
  public $emp_accountNumber = null;
  public $emp_ifscCode = null;
  public $emp_desg = null;
  public $emp_status = 'Active';
  public static $dbConnection = null;
  const Relation = "Employee";

  /*
    *
    *
    */
  public function __construct($connection)
  {
    Employee::$dbConnection = $connection;
  }

  public function __destruct()
  {
    Employee::$dbConnection = null;
  }

  /*
    * This method insert the employee record in the database.
    * User email and auto generated password will be inserted into the Login table.
    * This method emails the username(user's email) and password to the given email address.
    * The method return boolean values.
    */
  public function insert()
  {
    try {
      /*
        * Include class Login.
        */
      $msg = "";
      include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/Login/login.php';

      /*******************************************************************
       * Write the SQL.
       * Generate Employee Id.
       */
      $query  = "INSERT INTO " . Employee::Relation;
      $query .= "(emp_id, emp_fname, emp_mname, emp_lname, emp_email, emp_dob, emp_address, emp_gender, emp_reportsTo, emp_profilePhoto, emp_maritalStatus, emp_bankName, emp_accountNumber, emp_ifscCode, emp_phone, emp_dept, emp_desg)";
      $query .= " VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
      $stmt  = Employee::$dbConnection->prepare($query);

      /* Generate unique Employee ID.*/
      $emp_id = Employee::generateEmployeeId(Employee::$dbConnection);
      if (!empty($emp_id)) {
        $this->emp_id = $emp_id;
      }

      /*Transaction Block Started.*/
      Employee::$dbConnection->beginTransaction();

      /*Insert Employee in Employee Table.*/
      $data = [
        $this->emp_id,
        $this->emp_fname,
        $this->emp_mname,
        $this->emp_lname,
        $this->emp_email,
        $this->emp_dob,
        $this->emp_address,
        $this->emp_gender,
        $this->emp_reportsTo,
        $this->emp_profilePhoto,
        $this->emp_maritalStatus,
        $this->emp_bankName,
        $this->emp_accountNumber,
        $this->emp_ifscCode,
        $this->emp_phone,
        $this->emp_dept,
        $this->emp_desg
      ];

      if (!$stmt->execute($data)) {
        Employee::$dbConnection->rollBack();
        $msg .= "Failed to insert record\n";
        return array('Flag' => FALSE, 'Message' => $msg);
      }
      /**************************End Employee****************************/

      /*******************************************************************
       * Insert in employee login.
       * Email the employee his/her username and password.
       */

      $login = new Login(Employee::$dbConnection);
      $login->email = $this->emp_email;
      $login->password = Employee::generatePassword();

      $query  = "INSERT INTO " . Login::Relation;
      $query .= "(email, password, user_type)";
      $query .= " VALUES(?,?,?)";

      $stmt = Employee::$dbConnection->prepare($query);

      if (!$stmt->execute([$login->email, $login->password, "EMP"])) {
        Employee::$dbConnection->rollBack();
        $msg .= "Failed to insert login details \n";
        return array('Flag' => FALSE, 'Message' => $msg);
      }

      /*
            * Send emmail to Employee.
            */
      $data = array(
        'email'    => $login->email, //User email
        'Content'  => "<h3>Username : " . $login->email . "</h3><br><h3>Password :" . $login->password . " </h3>"
        //Email body
      );

      if (!Employee::sendEmail($data))
        $msg .= "Unable to send email \n";

      /**************************End Employee Login**********************/

      Employee::$dbConnection->commit();
      /*Transaction Block Ends.*/
    } catch (\PDOException $e) {
      Employee::$dbConnection->rollBack();
      $msg .= "Exception occured! \n";
      return array('Flag' => FALSE, 'Message' => $msg);
    }

    return array('Flag' => TRUE, 'Message' => $msg);
  }

  /*
    * This static function generates employee Id
    *
    *
    */
  public static function generateEmployeeId($conn)
  {
    $emp_id = "";
    /*
      * If query() returns a PDOobject
      */
    if ($res = $conn->query("SELECT count(emp_id) FROM Employee")) {
      /*
        * Count the number of rows.
        */
      $rowCount = $res->fetchColumn();

      /*
        * If there are > 0 rows
        */
      if ($rowCount > 0) {
        $rowCount = $rowCount + 1;
        /*
          * Add trailing zeros to make the id in required format.
          * eg. EMPxxxx
          */
        for ($i = strlen($rowCount); $i < 4; $i++) {
          $rowCount = '0' . $rowCount;
        }
        $emp_id = "EMP" . $rowCount;
      } else {
        /*
          * First Employee
          */
        $emp_id = "EMP0001";
      }
    }
    return $emp_id;
  }

  /*
    * This is a utility function.
    * This function emails username and password to the employee.
    */

  public static function sendEmail($data)
  {
    $mail = new PHPMailer(true);
    try {
      $mail->SMTPDebug = 2;
      $mail->isSMTP();
      $mail->Host       = 'smtp.gmail.com';
      $mail->SMTPAuth   = true;
      $mail->SMTPSecure = 'ssl';
      $mail->Port       = 587;
      $mail->Username   = 'aniket.pandey2019@vitstudent.ac.in';
      $mail->Password   = 'Aniket@1997';
      $mail->setFrom('aniket.pandey2019@vitstudent.ac.in', 'Aniket Pandey');
      $mail->addAddress('receiver1@gfg.com');
      $mail->isHTML(true);
      $mail->Subject = 'Login Credintial';
      $mail->Body    = $data['Content'];
      $mail->send();
    } catch (Exception $e) {
      return FALSE;
    }
    return TRUE;
  }

  /*
    * This utility function generates random alphnumeric password
    * The uniqid() function is an inbuilt function which is used to generate a unique ID
    * based on the current time in microseconds (micro time).
    * By default, it returns a 13 character long unique string.
    */

  public static function generatePassword()
  {
    return uniqid();
  }

  /**
   * Returns the list of employee.
   */
  public static function getEmployee()
  {
    $stmt = Employee::$dbConnection->prepare("SELECT emp_id, emp_fname, emp_lname, emp_mname, desgName, emp_profilePhoto FROM " . Employee::Relation . " E, Designation D WHERE D.desgId = E.emp_desg AND emp_status =? Order By emp_fname");
    $stmt->execute(array('Active'));
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($response); $i++) {
      $response[$i]['emp_id'] = base64_encode($response[$i]['emp_id']);
    }
    return $response;
  }

  /**
   * Update the employee status to 'inactive'
   */
  public function deleteEmployee()
  {
    try {
      $stmt = Employee::$dbConnection->prepare("UPDATE " . Employee::Relation . " SET emp_status = 'Inactive' WHERE emp_id = ?");
      $response = $stmt->execute(array($this->emp_id));
      return $response;
    } catch (PDOException $e) {
      return False;
    }
  }

  /**
   * Utilty function to return the list of employee matching with provided id.
   */

  public static function searchByID($emp_id)
  {
    $stmt = Employee::$dbConnection->prepare("SELECT emp_id, emp_fname, emp_lname, emp_mname, desgName, emp_profilePhoto FROM " . Employee::Relation . " E, Designation D WHERE emp_id = ? AND emp_status ='Active' AND D.desgId = E.emp_desg");
    $stmt->execute(array($emp_id));
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($response); $i++) {
      $response[$i]['emp_id'] = base64_encode($response[$i]['emp_id']);
    }
    return $response;
  }

  /**
   * Utility function returns a list of employee mathcing provided designation.
   */
  public static function searchByDesgination($emp_desg)
  {
    $stmt = Employee::$dbConnection->prepare("SELECT emp_id, emp_fname, emp_lname, emp_mname, desgName, emp_profilePhoto FROM " . Employee::Relation . " E, Designation D WHERE emp_desg = ? AND emp_status ='Active' AND D.desgId = E.emp_desg");
    $stmt->execute(array($emp_desg));
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($response); $i++) {
      $response[$i]['emp_id'] = base64_encode($response[$i]['emp_id']);
    }
    return $response;
  }

  /**
   * 
   * 
   */
  public static function searchByNameDesignation($emp_name, $emp_desg)
  {
    $stmt = Employee::$dbConnection->prepare("SELECT emp_id, emp_fname, emp_lname, emp_mname, desgName, emp_profilePhoto FROM " . Employee::Relation . " E, Designation D WHERE emp_desg = ? AND emp_status ='Active' AND (emp_fname LIKE ? OR emp_mname LIKE ? OR emp_lname LIKE ?) AND D.desgId = E.emp_desg");
    $stmt->execute(array($emp_desg, '%' . $emp_name . '%', '%' . $emp_name . '%', '%' . $emp_name . '%'));
    $response = $stmt->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($response); $i++) {
      $response[$i]['emp_id'] = base64_encode($response[$i]['emp_id']);
    }
    return $response;
  }

  public static function EmployeeProfileDetail($emp_id)
  {
    /**
     * Employee Personal Detail.
     */
    $stmt = Employee::$dbConnection->prepare("SELECT emp_id, emp_maritalStatus, emp_fname, emp_lname, emp_mname, emp_email, DATE_FORMAT(emp_dob, '%D %M') as emp_dob, DATE_FORMAT(DATE(emp_dateOfJoining), '%D %M %Y') as emp_dateOfJoining, emp_address, emp_gender, emp_profilePhoto, emp_bankName, emp_accountNumber, emp_ifscCode, emp_phone, desgName FROM " . Employee::Relation . " E, Designation D WHERE E.emp_id = ? AND D.desgId = E.emp_desg");
    $stmt->execute(array($emp_id));
    $pd = $stmt->fetch(PDO::FETCH_ASSOC);

    /**
     * Supervisior Detail.
     */
    $stmt = Employee::$dbConnection->prepare("SELECT emp_id, emp_fname, emp_lname, emp_mname, emp_profilePhoto FROM " . Employee::Relation . " WHERE emp_id = (SELECT emp_reportsTo FROM Employee WHERE emp_id = ?) AND emp_status = 'Active'");
    $stmt->execute(array($emp_id));
    $sd = $stmt->fetch(PDO::FETCH_ASSOC);

    /**
     * Emergency Contact Detail
     */
    $stmt = Employee::$dbConnection->prepare("SELECT name, emp_relationship, phone FROM EmployeeEmergency WHERE emp_id = ? ");
    $stmt->execute(array($emp_id));
    $emd = $stmt->fetchAll(PDO::FETCH_ASSOC);

    /**
     * Family Detail
     */
    $stmt = Employee::$dbConnection->prepare("SELECT familyMemberName, DATE_FORMAT(familyMemberDOB,'%M %D %Y') as familyMemberDOB, familyMemberPhone, familyMemberRelationship FROM EmployeeFamily WHERE emp_id = ? ");
    $stmt->execute(array($emp_id));
    $fd = $stmt->fetchAll(PDO::FETCH_ASSOC);

    /**
     * Employee Education Detail
     */
    $stmt = Employee::$dbConnection->prepare("SELECT institute_name, subject, degree, DATE_FORMAT(startDate,'%Y') as startDate, DATE_FORMAT(completeDate, '%Y') as completeDate FROM EmployeeEducation WHERE emp_id = ? ");
    $stmt->execute(array($emp_id));
    $edd = $stmt->fetchAll(PDO::FETCH_ASSOC);

    /**
     * Employee Experience Detail
     */
    $stmt = Employee::$dbConnection->prepare("SELECT company_name, jobPosition,DATE_FORMAT(periodFrom,'%M %Y') as periodFrom, DATE_Format(periodTo,'%M %Y') as periodTo FROM EmployeeExperience WHERE emp_id = ? ");
    $stmt->execute(array($emp_id));
    $exd = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return array(
      'PD' => $pd,
      'SD' => $sd,
      'EmD' => $emd,
      'FD' => $fd,
      'EdD' => $edd,
      'ExD' => $exd
    );
  }
}
