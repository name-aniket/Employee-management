<?php
session_start();

if (isset($_SESSION['user_detail'])) {

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
                            <span><?php echo $_SESSION['user_detail']['emp_fname'] . ' ' . $_SESSION['user_detail']['emp_lname']; ?></span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">My Profile</a>
                            <a class="dropdown-item" href="change_password.php">Settings</a>
                            <a class="dropdown-item" href="../../Login/logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
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
                <div class="content container-fluid">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Change Password</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Settings</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title"> Password Information</h3>
                            <form>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label"> Current Password </label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="curr_password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label"> New Password </label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="new_password" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="col-form-label"> Confirm Password </label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="confrm_password" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <a href="#" class="btn btn-success btn-block" id="search"> Change Password </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Page Content -->
            </div>
            <!-- Page Wrapper -->
        </div>

        <input type="hidden" value="<?php echo base64_encode($_SESSION['user_detail']['emp_id']); ?>" id="emp_id">

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

        <script src="../../assets/js/custom/Recruit/change_password.js"></script>

    </body>

    </html>
<?php } else {

    header("location:../../Error/404.php");
} ?>