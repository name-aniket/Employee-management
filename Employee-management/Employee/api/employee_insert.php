<?php
header("Access-Control-Allow-Origin: http://localhost/IWP/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/Employee/Employee.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/IWP/config/core.php';

$database   = new Database($dbconfig['username'], $dbconfig['password']);
$connection = $database->getConnection();
$emp   = new Employee($connection);
$validateInput = true;
$extension = "";
$msg = "";
try {

  /***FIRST NAME***/
  if (isset($_POST['emp_fname']) && !empty($_POST['emp_fname'])) {
    $emp->emp_fname = strip_tags(trim($_POST['emp_fname']));
  } else {
    $msg .= "First name is not a valid.";
    $validateInput = False;
  }
  /******/


  /*** MIDDLE NAME ***/
  if (isset($_POST['emp_mname']) && !empty($_POST['emp_mname'])) {
    $emp->emp_mname = strip_tags(trim($_POST['emp_mname']));
  } else {
    $emp->emp_mname = null;
  }
  /******/


  /***LAST NAME***/
  if (isset($_POST['emp_lname']) && !empty($_POST['emp_lname'])) {
    $emp->emp_lname = strip_tags(trim($_POST['emp_lname']));
  } else {
    $msg .= "Last name is not a valid.\n";
    $validateInput = False;
  }
  /******/


  /***EMAIL***/
  if (isset($_POST['emp_email']) && !empty($_POST['emp_email'])) {
    $emp->emp_email = strip_tags(trim($_POST['emp_email']));
  } else {
    $msg .= "Email is not a valid.\n";
    $validateInput = False;
  }
  /******/


  /*** DATE OF BIRTH ***/
  if (isset($_POST['emp_dob']) && !empty($_POST['emp_dob'])) {
    $emp->emp_dob = DateTime::createFromFormat('j/m/Y', strip_tags(trim($_POST['emp_dob'])))->format('Y-m-d');
  } else {
    $msg .= "Not a valid date.\n";
    $validateInput = False;
  }
  /******/


  /***ADDRESS***/
  if (isset($_POST['emp_address']) && !empty($_POST['emp_address'])) {
    $emp->emp_address = strip_tags(trim($_POST['emp_address']));
  } else {
    $msg .= "Address does not accept given value.\n";
    $validateInput = False;
  }
  /******/


  /***GENDER***/
  if (isset($_POST['emp_gender']) && !empty($_POST['emp_gender']))
    $emp->emp_gender = strip_tags(trim($_POST['emp_gender']));
  else
    $validateInput = False;
  /******/


  /***SUPERVISIOR***/
  if (isset($_POST['emp_reportsTo']) && !empty($_POST['emp_reportsTo'])) {
    $emp->emp_reportsTo = strip_tags(trim($_POST['emp_reportsTo']));
  } else {
    $msg .= "\\n Please select a supervisior.";
    $validateInput = False;
  }
  /******/

  /***Marital Status***/
  if (isset($_POST['emp_maritalStatus']) && !empty($_POST['emp_maritalStatus'])) {
    $emp->emp_maritalStatus = strip_tags(trim($_POST['emp_maritalStatus']));
  } else {
    $msg .= "Please provide marital status.\n";
    $validateInput = False;
  }
  /******/


  /***Bank Name***/
  if (isset($_POST['emp_bankName']) && !empty($_POST['emp_bankName'])) {
    $emp->emp_bankName = strip_tags(trim($_POST['emp_bankName']));
  } else {
    $msg .= "Please provide bank name.\n";
    $validateInput = False;
  }
  /******/


  /***Account Number***/
  if (isset($_POST['emp_accountNumber']) && !empty($_POST['emp_accountNumber'])) {
    $emp->emp_accountNumber = strip_tags(trim($_POST['emp_accountNumber']));
  } else {
    $msg .= "Please provide account name.\n";
    $validateInput = False;
  }
  /******/


  /***IFSC COde***/
  if (isset($_POST['emp_ifscCode']) && !empty($_POST['emp_ifscCode'])) {
    $emp->emp_ifscCode = strip_tags(trim($_POST['emp_ifscCode']));
  } else {
    $msg .= "Please provide IFSC code.\n";
    $validateInput = False;
  }
  /******/


  /***Contact Number***/
  if (isset($_POST['emp_phone']) && !empty($_POST['emp_phone'])) {
    $emp->emp_phone = strip_tags(trim($_POST['emp_phone']));
  } else {
    $msg .= "Please provide a valid conatct number.\n";
    $validateInput = False;
  }
  /******/

  /***Employee Department***/
  if (isset($_POST['emp_dept']) && !empty($_POST['emp_dept'])) {
    $emp->emp_dept = strip_tags(trim($_POST['emp_dept']));
  } else {
    $msg .= "Please select a Department.\n";
    $validateInput = False;
  }
  /******/

  /**
   * Employee Designation
   */
  if (isset($_POST['emp_desg']) && !empty($_POST['emp_desg'])) {
    $emp->emp_desg = strip_tags(trim($_POST['emp_desg']));
  } else {
    $msg .= "Please select a Designation.\n";
    $validateInput = False;
  }

  /*
        * If all the values are valid then only we check for the profile photo.
        * Upload file block of code
        */
  if ($validateInput) {
    /*
            * Check file is uploaded.
            * No error while uploading file.
            */
    if (isset($_FILES['emp_profilePhoto']) && $_FILES['emp_profilePhoto']['error'] == 0) {
      /*
                * Check wheather the uploaded file is actucally an image or not.
                */
      if (getimagesize($_FILES['emp_profilePhoto']['tmp_name']) !== False) {
        /*
                    * Get the extension of the file.
                    * eg. jgg, jgeg, png
                    */
        $ext = strtolower(pathinfo(basename($_FILES['emp_profilePhoto']['name']), PATHINFO_EXTENSION));

        /*
                    * Check the extension of the file.
                    * Only jpg, jpeg, png allowed
                    */
        if (in_array($ext, array("jpg", "jpeg", "png"), TRUE)) {
          /*
                      * Check the size of the file.
                      * The file should not be > 500kB
                      */
          if ($_FILES['emp_profilePhoto']['size'] < 500000) {
            /*
                        * Finally Upload the file
                        * The name of file will be current datetime.
                        * Upload directory is /assets/img/profiles/Employee
                        */
            $emp->emp_profilePhoto = date('m-d-Y h:i:s', time()) . '.' . $ext;

            $target_dir = $_SERVER['DOCUMENT_ROOT'] . '/IWP/assets/img/profiles/Employee/' . $emp->emp_profilePhoto;

            if (!move_uploaded_file($_FILES['emp_profilePhoto']['tmp_name'], $target_dir)) {
              $msg .= "Unable to upload image.\n";
              $validateInput = False;
            }
          } else {
            $msg .= "File is larger that 500kB.\n";
            $validateInput = False;
          }
        } else {
          $msg .= "Only following types are allowed (jpg, jpeg, png).\n";
          $validateInput = False;
        }
      } else {
        $msg .= "Provided file is not image type.\n";
        $validateInput = False;
      }
    } else {
      $msg .= "Image is not provided.\n";
      $validateInput = False;
    }
  }

  /*
        * If all the values are valid and image is stored successfully.
        * Then insert the values in the database.
        * If insertion fails then delete the already uploaded image from the folder.
        */
  if ($validateInput) {

    $dbStatus = $emp->insert();

    if (!$dbStatus['Flag']) {
      /*
              * Delete the image from the folder.
              * Set the flag to false.
              */
      if (!unlink($target_dir)) {
        $validateInput = False;
      }
      /*
              * Record is not inserted
              */
      $msg .= $dbStatus['Message'];
      $validateInput = False;
    }
  }
} catch (\Exception $e) {
  $msg .= "Exception occured! \n";
  $validateInput = False;
}

http_response_code(200);

echo json_encode(
  array(
    'Flag'    => $validateInput,
    'data'    => $emp,
    'Message' => $msg
  )
);
