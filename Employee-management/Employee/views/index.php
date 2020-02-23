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
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="menu-title">
							<span>Main</span>
						</li>
						<li class="submenu">
							<a href="javascript:void(0)"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="Employee.php">All Employees</a></li>
								<li><a href="attendance.php">Attendance (Employee)</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0)"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="../../Project/views/Projects.php">Projects</a></li>
								<li><a href="../../Project/views/tasks.php">Tasks</a></li>
							</ul>
						</li>
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
							<h3 class="page-title">Welcome Admin!</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item active">Dashboard</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Content -->
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

	<!-- Custom JS -->
	<script src="../../assets/js/app.js"></script>

</body>
</html>