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
                            <h3 class="page-title">Attendance</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Attendance</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->

                <!-- Search Filter -->
                <div class="row filter-row">
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating" id="month">
                                <option>-</option>
                                <option value="1">Jan</option>
                                <option value="2">Feb</option>
                                <option value="3">Mar</option>
                                <option value="4">Apr</option>
                                <option value="5">May</option>
                                <option value="6">Jun</option>
                                <option value="7">Jul</option>
                                <option value="8">Aug</option>
                                <option value="9">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>
                            <label class="focus-label">Select Month</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="form-group form-focus select-focus">
                            <select class="select floating" id="year">
                                <option>-</option>
                                <option value="2020">2020</option>
                                <option value="2019">2019</option>
                                <option value="2018">2018</option>
                            </select>
                            <label class="focus-label">Select Year</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="#" class="btn btn-success btn-block" id="search"> Search </a>
                    </div>
                </div>
                <!-- /Search Filter -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table table-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th>Employee</th>
                                        <th>1</th>
                                        <th>2</th>
                                        <th>3</th>
                                        <th>4</th>
                                        <th>5</th>
                                        <th>6</th>
                                        <th>7</th>
                                        <th>8</th>
                                        <th>9</th>
                                        <th>10</th>
                                        <th>11</th>
                                        <th>12</th>
                                        <th>13</th>
                                        <th>14</th>
                                        <th>15</th>
                                        <th>16</th>
                                        <th>17</th>
                                        <th>18</th>
                                        <th>19</th>
                                        <th>20</th>
                                        <th>21</th>
                                        <th>22</th>
                                        <th>23</th>
                                        <th>24</th>
                                        <th>25</th>
                                        <th>26</th>
                                        <th>27</th>
                                        <th>28</th>
                                        <th>29</th>
                                        <th>30</th>
                                        <th>31</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Content -->
        </div>
        <!-- Page Wrapper -->

    </div>

    <input type="hidden" value="<?php echo base64_encode($_SESSION['user_detail']['emp_id']); ?>" id="emp_id">

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

    <!-- Custom JS -->
    <script src="../../assets/js/app.js"></script>
    <script src="../../assets/js/custom/Recruit/attendance.js"></script>
</body>

</html>
<?php } else {

header("location:../../Error/404.php");
} ?>