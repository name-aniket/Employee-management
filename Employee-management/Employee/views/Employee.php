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
				<a href="./" class="logo">
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
				<h3>Employee Management</h3>
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
								<li><a href="">All Employees</a></li>
								<li><a href="attendance.php">Attendance (Employee)</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
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
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Employee</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="./">Dashboard</a></li>
								<li class="breadcrumb-item active">Employee</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="AddEmployee.php" class="btn add-btn"><i class="fa fa-plus"></i> Add Employee</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<!-- Search Filter -->
				<div class="row filter-row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" id="emp_id">
							<label class="focus-label">Employee ID</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating" id="emp_name">
							<label class="focus-label">Employee Name</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus select-focus">
							<select class="select floating" id="emp_desg">
							</select>
							<label class="focus-label">Designation</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<a href="javascript:void(0)" class="btn btn-success btn-block"> Search </a>
					</div>
				</div>
				<!-- Search Filter -->

				<div class="row staff-grid-row">
				</div>
				<div class="modal custom-modal fade" id="delete_employee" role="dialog">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-body">
								<div class="form-header">
									<h3>Delete Employee</h3>
									<p>Are you sure want to delete?</p>
								</div>
								<div class="modal-btn delete-action">
									<div class="row">
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary continue-btn">Delete</a>
										</div>
										<div class="col-6">
											<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
										</div>
									</div>
								</div>
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

		<!-- Select2 JS -->
		<script src="../../assets/js/select2.min.js"></script>

		<!-- Custom JS -->
		<script src="../../assets/js/app.js"></script>
		<script src="../../assets/js/custom/Employee/EmployeeList.js"></script>

</body>
</html>