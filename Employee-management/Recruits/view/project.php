<?php
session_start();

if (isset($_SESSION['user_detail'])) {

    include_once '../../config/core.php';

    include_once '../../config/database.php';

    $dbObj = new Database($dbconfig['username'], $dbconfig['password']);

    $conn  = $dbObj->getConnection();

    $emp_id = $_SESSION['user_detail']['emp_id'];

    $stmt = $conn->prepare(
        "SELECT proj_id, proj_name, DATE_FORMAT(proj_end, '%d %M %Y') As proj_end FROM Project WHERE proj_status = ? AND proj_id in (SELECT proj_id FROM ProjectLeader where proj_leader_id = ? UNION SELECT proj_id FROM ProjectMember where proj_member_id = ?)"
    );

    $stmt->execute(array(
        'Active',
        $emp_id,
        $emp_id
    ));

    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $record_to_return = array();

    foreach ($record as $row) {

        /**
         * Retrieve all the project leader
         */
        $stmt = $conn->prepare("SELECT concat(emp_fname,' ',emp_lname) As emp_name, emp_profilePhoto FROM Employee E, ProjectLeader PL WHERE E.emp_id = PL.proj_leader_id AND proj_id = ?");
        $stmt->execute(array($row['proj_id']));
        $project_leader_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

        /**
         * Retrieve all the project member
         */
        $stmt = $conn->prepare("SELECT concat(emp_fname,' ',emp_lname) As emp_name, emp_profilePhoto FROM Employee E, ProjectMember PM WHERE E.emp_id = PM.proj_member_id AND proj_id = ?");
        $stmt->execute(array($row['proj_id']));
        $project_member_array = $stmt->fetchAll(PDO::FETCH_ASSOC);

        array_push($record_to_return, array(
            'Project' => $row,
            'ProjectLeaderList' => $project_leader_array,
            'ProjectMemberList' => $project_member_array
        ));
    }
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

        <link rel="stylesheet" href="../../assets/plugins/summernote/summernote-bs4.css">
        </script>

        <!-- Main CSS -->
        <link rel="stylesheet" href="../../assets/css/style.css">
    </head>

    <body>
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
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="page-title">Projects</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Projects</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="row" id="content-body">
                        <?php foreach ($record_to_return as $row) : ?>
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown dropdown-action profile-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">';
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_project"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_project"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html"><?php echo $row['Project']['proj_name']; ?></a></h4>
                                        <small class="block text-ellipsis m-b-15">
                                            <span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
                                            <span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
                                        </small>
                                        <p class="text-muted">This paragraph is the description for the project.</p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">Deadline:</div>
                                            <div class="text-muted"><?php echo $row['Project']['proj_end']; ?></div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <?php foreach ($row['ProjectLeaderList'] as $r) : ?>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $r['emp_name'] ?>"><img alt="" src="../../assets/img/profiles/Employee/<?php echo $r['emp_profilePhoto']; ?>"></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <?php foreach ($row['ProjectMemberList'] as $row) : ?>
                                                    <li>
                                                        <a href="#" data-toggle="tooltip" title="<?php echo $row['emp_name']; ?>"><img alt="" src="../../assets/img/profiles/Employee/<?php echo $row['emp_profilePhoto']; ?>"></a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="40%" style="width: 40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <!-- /Page Wrapper -->

        </div>
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


        <!-- Custom JS -->
        <script src="../../assets/js/app.js"></script>
        <script src="../../assets/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- <script src="../../assets/js/custom/Project/project.js"></script> -->
    </body>

    </html>
<?php
} else {
    header("location:../../Error/404.php");
}
