<?php

session_start();

if (isset($_SESSION['user_detail'])) {

    include_once '../../config/core.php';
    include_once '../../config/database.php';
    include_once '../../Employee/Employee.php';

    $dbObj = new Database($dbconfig['username'], $dbconfig['password']);

    $conn  = $dbObj->getConnection();

    $emp   = new Employee($conn);

    $data  = Employee::EmployeeProfileDetail($_SESSION['user_detail']['emp_id']);

    $empPersonalDetail    = $data['PD'];

    $empSupervisiorDetail = $data['SD'];

    $empEmergencyDetail   = $data['EmD'];

    $empFamilyDetail      = $data['FD'];

    $empEducationDetail   = $data['EdD'];

    $empExperienceDetail  = $data['ExD'];
?>
    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="description" content="Bootstrap Admin">
        <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, management, responsive, CRM, Projects">
        <meta name="robots" content="noindex, nofollow">
        <title>Employee Management</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.png">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

        <!-- Fontawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">

        <!-- Lineawesome CSS -->
        <link rel="stylesheet" href="../../assets/css/line-awesome.min.css">

        <!-- Select2 CSS -->
        <link rel="stylesheet" href="../../assets/css/select2.min.css">

        <!-- Datetimepicker CSS -->
        <link rel="stylesheet" href="../../assets/css/bootstrap-datetimepicker.min.css">

        <!-- Tagsinput CSS -->
        <link rel="stylesheet" href="../../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css">

        <!-- Main CSS -->
        <link rel="stylesheet" href="../../assets/css/style.css">

    </head>

    <body>
        <!-- Main Wrapper -->
        <div class="main-wrapper">

            <!-- Header -->
            <div class="header">

                <!-- Logo -->
                <div class="header-left">
                    <a href="" class="logo">
                        <img src="../../assets/img/logo.png" width="40" height="40" alt="">
                    </a>
                </div>
                <!-- /Logo -->

                <a id="toggle_btn" href="javascript:void(0);">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>

                <!-- Header Title -->
                <div class="page-title-box">
                    <h3> Software Technologies </h3>
                </div>
                <!-- /Header Title -->

                <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

                <!-- Header Menu -->
                <ul class="nav user-menu">
                    <li class="nav-item dropdown has-arrow main-drop">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <span class="user-img"><img src="../../assets/img/profiles/Employee/<?php echo $_SESSION['user_detail']['emp_profilePhoto']; ?>" alt="">
                                <span class="status online"></span></span>
                            <span><?php echo $_SESSION['user_detail']['emp_fname'] . ' ' . $_SESSION['user_detail']['emp_lname'] ?></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">My Profile</a>
                            <a class="dropdown-item" href="change_password.php">Settings</a>
                            <a class="dropdown-item" href="../../Login/logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
                <!-- /Header Menu -->
            </div>
            <!-- /Header -->

            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li><a href="project.php">Project</a></li>
                            <li><a href="attendance.php">Attendance</a></li>
                            <li><a href="bank_satutory.php">Bank & Statutory</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Sidebar -->

            <!-- Page Wrapper -->
            <div class="page-wrapper">

                <!-- Page Content -->
                <div class="content container-fluid">
                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Profile</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile-view">
                                        <div class="profile-img-wrap">
                                            <div class="profile-img">
                                                <a href="#"><img alt="" src="../../assets/img/profiles/Employee/<?php echo $empPersonalDetail['emp_profilePhoto']; ?>"></a>
                                            </div>
                                        </div>
                                        <div class="profile-basic">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="profile-info-left">
                                                        <h3 class="user-name m-t-0 mb-0"><?php echo $empPersonalDetail['emp_fname'] . $empPersonalDetail['emp_mname'] . $empPersonalDetail['emp_lname']; ?></h3>
                                                        <small class="text-muted"><?php echo $empPersonalDetail['desgName']; ?></small>
                                                        <div class="staff-id">Employee ID : <?php echo $empPersonalDetail['emp_id']; ?></div>
                                                        <div class="small doj text-muted">Date of Join : <?php echo $empPersonalDetail['emp_dateOfJoining']; ?></div>
                                                    </div>
                                                </div>
                                                <div class="col-md-7">
                                                    <ul class="personal-info">
                                                        <li>
                                                            <div class="title">Phone:</div>
                                                            <div class="text"><a href="javascript:void(0)"><?php if (!isset($empPersonalDetail['emp_phone'])) {
                                                                                                                echo "NA";
                                                                                                            } else {
                                                                                                                echo $empPersonalDetail['emp_phone'];
                                                                                                            } ?></a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Email:</div>
                                                            <div class="text"><a href="javascript:void(0)"><?php if (!isset($empPersonalDetail['emp_email'])) {
                                                                                                                echo "NA";
                                                                                                            } else {
                                                                                                                echo $empPersonalDetail['emp_email'];
                                                                                                            } ?></a></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Birthday:</div>
                                                            <div class="text"><?php if (!isset($empPersonalDetail['emp_dob'])) {
                                                                                    echo "NA";
                                                                                } else {
                                                                                    echo $empPersonalDetail['emp_dob'];
                                                                                } ?></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Address:</div>
                                                            <div class="text"><?php if (!isset($empPersonalDetail['emp_address'])) {
                                                                                    echo "NA";
                                                                                } else {
                                                                                    echo $empPersonalDetail['emp_address'];
                                                                                } ?></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Gender:</div>
                                                            <div class="text"><?php if (!isset($empPersonalDetail['emp_gender'])) {
                                                                                    echo "NA";
                                                                                } else {
                                                                                    echo $empPersonalDetail['emp_gender'];
                                                                                } ?></div>
                                                        </li>
                                                        <li>
                                                            <div class="title">Reports to:</div>
                                                            <div class="text">
                                                                <div class="avatar-box">
                                                                    <div class="avatar avatar-xs">
                                                                        <?php if (isset($empSupervisiorDetail['emp_profilePhoto'])) {
                                                                            echo '<img src="' . $config['base_url'] . 'assets/img/profiles/Employee/' . $empSupervisiorDetail['emp_profilePhoto'] . '" alt="">';
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                </div>
                                                                <a href="javascript:void(0)">
                                                                    <?php if (!isset($empSupervisiorDetail['emp_fname'])) {
                                                                        echo "NA";
                                                                    } else {
                                                                        echo $empSupervisiorDetail['emp_fname'];
                                                                    }
                                                                    ?>
                                                                </a>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card tab-box">
                        <div class="row user-tabs">
                            <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                                <ul class="nav nav-tabs nav-tabs-bottom">
                                    <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content">

                        <!-- Profile Info Tab -->
                        <div id="emp_profile" class="pro-overview tab-pane fade show active">
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            <h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Passport No.</div>
                                                    <div class="text"><?php if (!isset($empPersonalDetail['emp_passportNo'])) {
                                                                            echo "<b>NA</b>";
                                                                        } else {
                                                                            echo $empPersonalDetail['emp_passportNo'];
                                                                        } ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Passport Exp Date.</div>
                                                    <div class="text"><?php if (!isset($empPersonalDetail['emp_passportExpDate'])) {
                                                                            echo "<b>NA</b>";
                                                                        } else {
                                                                            echo $empPersonalDetail['emp_passportExpDate'];
                                                                        } ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Tel</div>
                                                    <div class="text"><a href="javascript:void(0)"><?php if (!isset($empPersonalDetail['emp_phone'])) {
                                                                                                        echo "<b>NA</b>";
                                                                                                    } else {
                                                                                                        echo $empPersonalDetail['emp_phone'];
                                                                                                    } ?></a></div>
                                                </li>
                                                <li>
                                                    <div class="title">Nationality</div>
                                                    <div class="text">Indian</div>
                                                </li>
                                                <li>
                                                    <div class="title">Religion</div>
                                                    <div class="text">Christian</div>
                                                </li>
                                                <li>
                                                    <div class="title">Marital status</div>
                                                    <div class="text"><?php if (!isset($empPersonalDetail['emp_maritalStatus'])) {
                                                                            echo "<b>NA</b>";
                                                                        } else {
                                                                            echo $empPersonalDetail['emp_maritalStatus'];
                                                                        } ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Employment of spouse</div>
                                                    <div class="text"><?php if (!isset($empPersonalDetail['emp_spouseEmp'])) {
                                                                            echo "<b>NA</b>";
                                                                        } else {
                                                                            echo $empPersonalDetail['emp_spouseEmp'];
                                                                        } ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">No. of children</div>
                                                    <div class="text"><?php if (!isset($empPersonalDetail['emp_noChildren'])) {
                                                                            echo "<b>NA</b>";
                                                                        } else {
                                                                            echo $empPersonalDetail['emp_noChildren'];
                                                                        } ?></div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            <h3 class="card-title">Emergency Contact <?php if (count($empEmergencyDetail) !== 0) : ?><a href="#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a><?php endif; ?></h3>
                                            <?php if (count($empEmergencyDetail) == 0) : ?>
                                                <h5 class="section-title">No data Available ! Please ask the employee to fill the details.</h5>
                                            <?php endif; ?>
                                            <?php foreach ($empEmergencyDetail as $row) : ?>
                                                <ul class="personal-info">
                                                    <li>
                                                        <div class="title">Name</div>
                                                        <div class="text">
                                                            <?php if (isset($row['name'])) {
                                                                echo $row['name'];
                                                            } else {
                                                                echo "NA";
                                                            } ?>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Relationship</div>
                                                        <div class="text"><?php if (isset($row['emp_relationship'])) {
                                                                                echo $row['emp_relationship'];
                                                                            } else {
                                                                                echo "NA";
                                                                            } ?></div>
                                                    </li>
                                                    <li>
                                                        <div class="title">Phone </div>
                                                        <div class="text"><?php if (isset($row['phone'])) {
                                                                                echo $row['phone'];
                                                                            } else {
                                                                                echo "NA";
                                                                            } ?></div>
                                                    </li>
                                                </ul>
                                                <hr>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            <h3 class="card-title">Bank information</h3>
                                            <ul class="personal-info">
                                                <li>
                                                    <div class="title">Bank name</div>
                                                    <div class="text"><?php if (!isset($empPersonalDetail['emp_bankName'])) {
                                                                            echo "<b>NA</b>";
                                                                        } else {
                                                                            echo $empPersonalDetail['emp_bankName'];
                                                                        } ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">Bank account No.</div>
                                                    <div class="text"><?php if (!isset($empPersonalDetail['emp_accountNumber'])) {
                                                                            echo "<b>NA</b>";
                                                                        } else {
                                                                            echo $empPersonalDetail['emp_accountNumber'];
                                                                        } ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">IFSC Code</div>
                                                    <div class="text"><?php if (!isset($empPersonalDetail['emp_ifscCode'])) {
                                                                            echo "<b>NA</b>";
                                                                        } else {
                                                                            echo $empPersonalDetail['emp_ifscCode'];
                                                                        } ?></div>
                                                </li>
                                                <li>
                                                    <div class="title">PAN No</div>
                                                    <div class="text">
                                                        <?php if (!isset($empPersonalDetail['emp_panNo'])) {
                                                            echo "<b>NA</b>";
                                                        } else {
                                                            echo $empPersonalDetail['emp_panNo'];
                                                        } ?>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            <h3 class="card-title">Family Informations <?php if (count($empFamilyDetail) !== 0) : ?><a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a><?php endif; ?></h3>
                                            <?php if (count($empFamilyDetail) !== 0) : ?>
                                                <div class="table-responsive">
                                                    <table class="table table-nowrap">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Relationship</th>
                                                                <th>Date of Birth</th>
                                                                <th>Phone</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($empFamilyDetail as $row) : ?>
                                                                <tr>
                                                                    <td><?php if (isset($row['familyMemberName'])) {
                                                                            echo $row['familyMemberName'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?></td>
                                                                    <td><?php if (isset($row['familyMemberRelationship'])) {
                                                                            echo $row['familyMemberRelationship'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?></td>
                                                                    <td><?php if (isset($row['familyMemberDOB'])) {
                                                                            echo $row['familyMemberDOB'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?></td>
                                                                    <td><?php if (isset($row['familyMemberPhone'])) {
                                                                            echo $row['familyMemberPhone'];
                                                                        } else {
                                                                            echo "NA";
                                                                        } ?></td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            <?php else : ?>
                                                <h5 class="section-title">No data Available ! Please ask the employee to fill the details.</h5>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <?php if (count($empEducationDetail) !== 0) : ?><a href="#" class="edit-icon" data-toggle="modal" data-target="#education_info"><i class="fa fa-pencil"></i></a><?php endif; ?></h3>
                                            <?php if (count($empEducationDetail) !== 0) : ?>
                                                <div class="experience-box">
                                                    <ul class="experience-list">
                                                        <?php foreach ($empEducationDetail as $row) : ?>
                                                            <li>
                                                                <div class="experience-user">
                                                                    <div class="before-circle"></div>
                                                                </div>
                                                                <div class="experience-content">
                                                                    <div class="timeline-content">
                                                                        <a href="#/" class="name"><?php if (isset($row['institute_name']) && isset($row['degree'])) {
                                                                                                        echo $row['institute_name'] . ' (' . $row['degree'] . ')';
                                                                                                    } else {
                                                                                                        echo "NA";
                                                                                                    } ?></a>
                                                                        <div><?php if (isset($row['subject'])) {
                                                                                    echo $row['subject'];
                                                                                } else {
                                                                                    echo "NA";
                                                                                } ?></div>
                                                                        <span class="time"><?php if (isset($row['startDate']) && isset($row['completeDate'])) {
                                                                                                echo $row['startDate'] . '-' . $row['completeDate'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php else : ?>
                                                <h5 class="section-title">No data Available ! Please ask the employee to fill the details.</h5>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 d-flex">
                                    <div class="card profile-box flex-fill">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience <?php if (count($empExperienceDetail) !== 0) : ?><a href="#" class="edit-icon" data-toggle="modal" data-target="#experience_info"><i class="fa fa-pencil"></i></a><?php endif; ?></h3>
                                            <?php if (count($empExperienceDetail) !== 0) : ?>
                                                <div class="experience-box">
                                                    <ul class="experience-list">
                                                        <?php foreach ($empExperienceDetail as $row) : ?>
                                                            <li>
                                                                <div class="experience-user">
                                                                    <div class="before-circle"></div>
                                                                </div>
                                                                <div class="experience-content">
                                                                    <div class="timeline-content">
                                                                        <a href="javascript:void(0)" class="name"><?php if (isset($row['company_name']) && isset($row['jobPosition'])) {
                                                                                                                        echo $row['jobPosition'] . ' at ' . $row['company_name'];
                                                                                                                    } else {
                                                                                                                        echo "NA";
                                                                                                                    } ?></a>
                                                                        <span class="time"><?php if (isset($row['periodFrom']) && isset($row['periodTo'])) {
                                                                                                echo $row['periodFrom'] . ' - ' . $row['periodTo'];
                                                                                            } else {
                                                                                                echo "NA";
                                                                                            } ?></span>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            <?php else : ?>
                                                <h5 class="section-title">No data Available ! Please ask the employee to fill the details.</h5>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Bank Statutory Tab -->
                        <div class="tab-pane fade" id="bank_statutory">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title"> Basic Salary Information</h3>
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Salary basis <span class="text-danger">*</span></label>
                                                    <select class="select">
                                                        <option>Select salary basis type</option>
                                                        <option>Hourly</option>
                                                        <option>Daily</option>
                                                        <option>Weekly</option>
                                                        <option>Monthly</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Salary amount <small class="text-muted">per month</small></label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">$</span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Type your salary amount" value="0.00">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Payment type</label>
                                                    <select class="select">
                                                        <option>Select payment type</option>
                                                        <option>Bank transfer</option>
                                                        <option>Check</option>
                                                        <option>Cash</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3 class="card-title"> PF Information</h3>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">PF contribution</label>
                                                    <select class="select">
                                                        <option>Select PF contribution</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">PF No. <span class="text-danger">*</span></label>
                                                    <select class="select">
                                                        <option>Select PF contribution</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Employee PF rate</label>
                                                    <select class="select">
                                                        <option>Select PF contribution</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                                    <select class="select">
                                                        <option>Select additional rate</option>
                                                        <option>0%</option>
                                                        <option>1%</option>
                                                        <option>2%</option>
                                                        <option>3%</option>
                                                        <option>4%</option>
                                                        <option>5%</option>
                                                        <option>6%</option>
                                                        <option>7%</option>
                                                        <option>8%</option>
                                                        <option>9%</option>
                                                        <option>10%</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Total rate</label>
                                                    <input type="text" class="form-control" placeholder="N/A" value="11%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Employee PF rate</label>
                                                    <select class="select">
                                                        <option>Select PF contribution</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                                    <select class="select">
                                                        <option>Select additional rate</option>
                                                        <option>0%</option>
                                                        <option>1%</option>
                                                        <option>2%</option>
                                                        <option>3%</option>
                                                        <option>4%</option>
                                                        <option>5%</option>
                                                        <option>6%</option>
                                                        <option>7%</option>
                                                        <option>8%</option>
                                                        <option>9%</option>
                                                        <option>10%</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Total rate</label>
                                                    <input type="text" class="form-control" placeholder="N/A" value="11%">
                                                </div>
                                            </div>
                                        </div>

                                        <hr>
                                        <h3 class="card-title"> ESI Information</h3>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">ESI contribution</label>
                                                    <select class="select">
                                                        <option>Select ESI contribution</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">ESI No. <span class="text-danger">*</span></label>
                                                    <select class="select">
                                                        <option>Select ESI contribution</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Employee ESI rate</label>
                                                    <select class="select">
                                                        <option>Select ESI contribution</option>
                                                        <option>Yes</option>
                                                        <option>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Additional rate <span class="text-danger">*</span></label>
                                                    <select class="select">
                                                        <option>Select additional rate</option>
                                                        <option>0%</option>
                                                        <option>1%</option>
                                                        <option>2%</option>
                                                        <option>3%</option>
                                                        <option>4%</option>
                                                        <option>5%</option>
                                                        <option>6%</option>
                                                        <option>7%</option>
                                                        <option>8%</option>
                                                        <option>9%</option>
                                                        <option>10%</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label class="col-form-label">Total rate</label>
                                                    <input type="text" class="form-control" placeholder="N/A" value="11%">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="submit-section">
                                            <button class="btn btn-primary submit-btn" type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Bank Statutory Tab -->

                    </div>
                </div>
                <!-- /Page Content -->

                <!-- Profile Modal -->
                <div id="profile_info" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Profile Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="profile-img-wrap edit-img">
                                                <img class="inline-block" src="assets/img/profiles/avatar-02.jpg" alt="user">
                                                <div class="fileupload btn">
                                                    <span class="btn-text">edit</span>
                                                    <input class="upload" type="file">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" value="John">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" value="Doe">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Birth Date</label>
                                                        <div class="cal-icon">
                                                            <input class="form-control datetimepicker" type="text" value="05/06/1985">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Gender</label>
                                                        <select class="select form-control">
                                                            <option value="male selected">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" value="4487 Snowbird Lane">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" value="New York">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" value="United States">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Pin Code</label>
                                                <input type="text" class="form-control" value="10523">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" class="form-control" value="631-889-3206">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Department <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select Department</option>
                                                    <option>Web Development</option>
                                                    <option>IT Management</option>
                                                    <option>Marketing</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Designation <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>Select Designation</option>
                                                    <option>Web Designer</option>
                                                    <option>Web Developer</option>
                                                    <option>Android Developer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Reports To <span class="text-danger">*</span></label>
                                                <select class="select">
                                                    <option>-</option>
                                                    <option>Wilmer Deluna</option>
                                                    <option>Lesley Grauer</option>
                                                    <option>Jeffery Lalor</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Profile Modal -->

                <!-- Personal Info Modal -->
                <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Personal Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Passport No</label>
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Passport Expiry Date</label>
                                                <div class="cal-icon">
                                                    <input class="form-control datetimepicker" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tel</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nationality <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Religion</label>
                                                <div class="cal-icon">
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Marital status <span class="text-danger">*</span></label>
                                                <select class="select form-control">
                                                    <option>-</option>
                                                    <option>Single</option>
                                                    <option>Married</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Employment of spouse</label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. of children </label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Personal Info Modal -->

                <!-- Family Info Modal -->
                <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> Family Informations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-scroll">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Family Member <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Relationship <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Date of birth <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Relationship <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Date of birth <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone <span class="text-danger">*</span></label>
                                                            <input class="form-control" type="text">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="add-more">
                                                    <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Family Info Modal -->

                <!-- Emergency Contact Modal -->
                <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Personal Information</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Primary Contact</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone 2</label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Primary Contact</h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone 2</label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Emergency Contact Modal -->

                <!-- Education Modal -->
                <div id="education_info" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"> Education Informations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-scroll">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" value="Oxford University" class="form-control floating">
                                                            <label class="focus-label">Institution</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" value="Computer Science" class="form-control floating">
                                                            <label class="focus-label">Subject</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <div class="cal-icon">
                                                                <input type="text" value="01/06/2002" class="form-control floating datetimepicker">
                                                            </div>
                                                            <label class="focus-label">Starting Date</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <div class="cal-icon">
                                                                <input type="text" value="31/05/2006" class="form-control floating datetimepicker">
                                                            </div>
                                                            <label class="focus-label">Complete Date</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" value="BE Computer Science" class="form-control floating">
                                                            <label class="focus-label">Degree</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" value="Grade A" class="form-control floating">
                                                            <label class="focus-label">Grade</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" value="Oxford University" class="form-control floating">
                                                            <label class="focus-label">Institution</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" value="Computer Science" class="form-control floating">
                                                            <label class="focus-label">Subject</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <div class="cal-icon">
                                                                <input type="text" value="01/06/2002" class="form-control floating datetimepicker">
                                                            </div>
                                                            <label class="focus-label">Starting Date</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <div class="cal-icon">
                                                                <input type="text" value="31/05/2006" class="form-control floating datetimepicker">
                                                            </div>
                                                            <label class="focus-label">Complete Date</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" value="BE Computer Science" class="form-control floating">
                                                            <label class="focus-label">Degree</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus focused">
                                                            <input type="text" value="Grade A" class="form-control floating">
                                                            <label class="focus-label">Grade</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="add-more">
                                                    <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Education Modal -->

                <!-- Experience Modal -->
                <div id="experience_info" class="modal custom-modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Experience Informations</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-scroll">
                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                            <label class="focus-label">Company Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" class="form-control floating" value="United States">
                                                            <label class="focus-label">Location</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" class="form-control floating" value="Web Developer">
                                                            <label class="focus-label">Job Position</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <div class="cal-icon">
                                                                <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                                                            </div>
                                                            <label class="focus-label">Period From</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <div class="cal-icon">
                                                                <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                                            </div>
                                                            <label class="focus-label">Period To</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                            <label class="focus-label">Company Name</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" class="form-control floating" value="United States">
                                                            <label class="focus-label">Location</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <input type="text" class="form-control floating" value="Web Developer">
                                                            <label class="focus-label">Job Position</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <div class="cal-icon">
                                                                <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                                                            </div>
                                                            <label class="focus-label">Period From</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-focus">
                                                            <div class="cal-icon">
                                                                <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                                            </div>
                                                            <label class="focus-label">Period To</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="add-more">
                                                    <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section">
                                        <button class="btn btn-primary submit-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Experience Modal -->

            </div>
            <!-- /Page Wrapper -->

        </div>
        <!-- /Main Wrapper -->

        <!-- jQuery -->
        <script src="../../assets/js/jquery-3.2.1.min.js"></script>

        <!-- Bootstrap Core JS -->
        <script src="../../assets/js/popper.min.js"></script>
        <script src="../../assets/js/bootstrap.min.js"></script>

        <!-- Slimscroll JS -->
        <script src="../../assets/js/jquery.slimscroll.min.js"></script>

        <!-- Select2 JS -->
        <script src="../../assets/js/select2.min.js"></script>

        <!-- Datetimepicker JS -->
        <script src="../../assets/js/moment.min.js"></script>
        <script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>

        <!-- Tagsinput JS -->
        <script src="../../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

        <!-- Custom JS -->
        <script src="../../assets/js/app.js"></script>

    </body>

    </html>
<?php } else {
    header("location:../../Error/404.php");
} ?>