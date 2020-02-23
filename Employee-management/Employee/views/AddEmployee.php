<?php

/*
    * This condition validates the authenticity of the page
    * This page should only be refered from Employee.php
    * Unauthorised access should be restricted
    */
if (isset($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'], 'Employee.php')) {
	
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

		<!--Dialog Widget-->
		<link rel="stylesheet" href="../../assets/css/jquery-ui.css">

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
									<li><a href="./Employee.php">All Employees</a></li>
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
									<li class="breadcrumb-item"><a href="./Employee.php">Employee</a></li>
									<li class="breadcrumb-item">Add Employee</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title mb-0">Register Employee</h4>
								</div>
								<div class="card-body">
									<form id="insert_employee" method="post" action="">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">First Name <span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="emp_fname" required="required">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">Middle Name </label>
													<input class="form-control" type="text" name="emp_mname">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">Last name <span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="emp_lname" required="">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">Email <span class="text-danger">*</span></label>
													<input class="form-control" type="email" name="emp_email" required="">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">Address<span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="emp_address" pattern="^[A-Za-z0-9 /-]*$" required="">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="d-block">Gender:</label>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="emp_gender" id="gender_male" value="Male">
														<label class="form-check-label" for="gender_male">Male</label>
													</div>
													<div class="form-check form-check-inline">
														<input class="form-check-input" type="radio" name="emp_gender" id="gender_female" value="Female">
														<label class="form-check-label" for="gender_female">Female</label>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">Phone <span class="text-danger">*</span></label>
													<input class="form-control" type="text" pattern="^[0-9]{10}$" name="emp_phone" required="">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">Date of Birth <span class="text-danger">*</span></label>
													<div class="cal-icon"><input class="form-control datetimepicker" name="emp_dob" type="text"></div>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">Bank Name <span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="emp_bankName" required="required">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">Account Number <span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="emp_accountNumber" required="" pattern="^[0-9]*$">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">IFSC Code <span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="emp_ifscCode" required="" pattern="^[A-Za-z0-9]*$">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label"> Photo <span class="text-danger">*</span></label>
													<input class="form-control" type="file" name="emp_profilePhoto" required="required">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label>Department <span class="text-danger">*</span></label>
													<select class="select" name="emp_dept" id="emp_dept" required=""></select>
												</div>
											</div>
											<div class="col-sm-6">
												<div class="form-group">
													<label class="col-form-label">Marital Status</label>
													<select class="select" name="emp_maritalStatus">
														<option value="Married">Married</option>
														<option value="Single">Single</option>
														<option value="Divorced">Divorced</option>
														<option value="Widowed">Widowed</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-form-label">Supervisior</label>
													<select class="select" name="emp_reportsTo" required="">
														<option value="">Global Technologies</option>
														<option value="1">Delta Infotech</option>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Designation <span class="text-danger">*</span></label>
													<select class="select" name="emp_desg" id="emp_desg" required="">
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

			<!-- Datetimepicker JS -->
			<script src="../../assets/js/moment.min.js"></script>
			<script src="../../assets/js/bootstrap-datetimepicker.min.js"></script>

			<!--Dialog Widget-->
			<script src="../../assets/js/jquery-ui.js"></script>

			<!-- Custom JS -->
			<script src="../../assets/js/app.js"></script>
			<script src="../../assets/js/custom/Employee/EmployeeCRUD.js"></script>

	</body>

	</html>

<?php } else {
	/*
    * This page should be loaded only when the request is not authentic
    * 404 Forbidden page shuld be load
    */
	header("Location:../../Error/404.php");
} ?>