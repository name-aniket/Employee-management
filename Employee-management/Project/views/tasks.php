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

    <!-- Summernote CSS -->
    <link rel="stylesheet" href="../../assets/plugins/summernote/dist/summernote-bs4.css">
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <div class="header">

            <!-- Logo -->
            <div class="header-left">
                <a href="../../Employee/views/" class="logo">
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
                <h3>Employee management </h3>
            </div>
            <!-- /Header Title -->

            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

            <!-- Header Menu -->
            <ul class="nav user-menu">
                <li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img src="../../assets/img/logo2.jpg" alt="">
                            <span class="status online"></span></span>
                        <span>Admin</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0)">My Profile</a>
                        <a class="dropdown-item" href="javascript:void(0)">Settings</a>
                        <a class="dropdown-item" href="../../login.php">Logout</a>
                    </div>
                </li>
            </ul>
            <!-- /Header Menu -->
        </div>
        <!-- /Header -->

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div class="sidebar-menu">
                    <ul>
                        <li>
                            <a href="Projects.php"><i class="la la-home"></i> <span>Back to Home</span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Office Management</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <div class="chat-main-row">
                <div class="chat-main-wrapper">
                    <div class="col-lg-7 message-view task-view task-left-sidebar">
                        <div class="chat-window">
                            <div class="fixed-header">
                                <div class="navbar">
                                    <div class="float-left mr-auto">
                                        <div class="add-task-btn-wrapper">
                                            <span class="add-task-btn btn btn-white btn-sm">
                                                Add Task
                                            </span>
                                        </div>
                                    </div>
                                    <a class="task-chat profile-rightbar float-right" id="task_chat" href="#task_window"><i class="fa fa fa-comment"></i></a>
                                    <ul class="nav float-right custom-menu">
                                        <li class="nav-item dropdown dropdown-action">
                                            <a href="" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="javascript:void(0)">Pending Tasks</a>
                                                <a class="dropdown-item" href="javascript:void(0)">Completed Tasks</a>
                                                <a class="dropdown-item" href="javascript:void(0)">All Tasks</a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="chat-contents">
                                <div class="chat-content-wrap">
                                    <div class="chat-wrap-inner">
                                        <div class="chat-box">
                                            <div class="task-wrapper">
                                                <div class="task-list-container">
                                                    <div class="task-list-body">
                                                        <ul id="task-list">
                                                            <li class="task">
                                                                <div class="task-container">
                                                                    <span class="task-action-btn task-check">
                                                                        <span class="action-circle large complete-btn" title="Mark Complete">
                                                                            <i class="material-icons">check</i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="task-label" contenteditable="false">Employee Registration</span>
                                                                    <span class="task-action-btn task-btn-right">
                                                                        <span class="action-circle large delete-btn" title="Delete Task">
                                                                            <i class="material-icons">delete</i>
                                                                        </span>
                                                                    </span>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="task-list-footer">
                                                        <div class="new-task-wrapper">
                                                            <textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
                                                            <span class="error-message hidden">You need to enter a task first</span>
                                                            <span class="add-new-task-btn btn" id="add-task">Add Task</span>
                                                            <span class="btn" id="close-task-panel">Close</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notification-popup hide">
                                                <p>
                                                    <span class="task"></span>
                                                    <span class="notification-text"></span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

            <!-- Summernote JS -->
            <script src="../../assets/plugins/summernote/dist/summernote-bs4.min.js"></script>

            <!-- Task JS -->
            <script src="../../assets/js/task.js"></script>

            <!-- Custom JS -->
            <script src="../../assets/js/app.js"></script>

</body>

</html>