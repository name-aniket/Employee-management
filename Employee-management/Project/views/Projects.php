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

	<link rel="stylesheet" href="../../assets/plugins/summernote/summernote-bs4.css"></script>

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
				<a href="../../Employee/views/" class="logo">
					<img src="../../assets/img/logo.png" width="40" height="40" alt="">
				</a>
			</div>
			<!-- /Logo -->

			<a id="toggle_btn" href="javascript:void(0)">
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
						<span class="user-img"><img src="" alt="">
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
								<li><a href="../../Employee/views/Employee.php">All Employees</a></li>
								<li><a href="../../Employee/views/attendance.php">Attendance (Employee)</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="javascript:void(0)"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="">Projects</a></li>
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
							<h3 class="page-title">Projects</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="../../Employee/views/">Dashboard</a></li>
								<li class="breadcrumb-item active">Projects</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="./create-project.php" class="btn add-btn"><i class="fa fa-plus"></i> Create Project</a>
						</div>
					</div>
				</div>
				<!-- /Page Header -->

				<!-- Search Filter -->
				<div class="row filter-row">
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Project Name</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus">
							<input type="text" class="form-control floating">
							<label class="focus-label">Employee Name</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<div class="form-group form-focus select-focus">
							<select class="select floating">
								<option>Select Roll</option>
								<option>Web Developer</option>
								<option>Web Designer</option>
								<option>Android Developer</option>
								<option>Ios Developer</option>
							</select>
							<label class="focus-label">Designation</label>
						</div>
					</div>
					<div class="col-sm-6 col-md-3">
						<a href="#" class="btn btn-success btn-block"> Search </a>
					</div>
				</div>
				<!-- Search Filter -->

				<div class="row" id="content-body">
						
				</div>
			</div>
			<!-- /Page Content -->

			<!-- Create Project Modal -->
			<!-- <div id="create_project" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Create Project</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Project Name</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Client</label>
											<select class="select">
												<option>Global Technologies</option>
												<option>Delta Infotech</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Start Date</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text">
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>End Date</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label>Rate</label>
											<input placeholder="$50" class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>&nbsp;</label>
											<select class="select">
												<option>Hourly</option>
												<option>Fixed</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Priority</label>
											<select class="select">
												<option>High</option>
												<option>Medium</option>
												<option>Low</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Add Project Leader</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Team Leader</label>
											<div class="project-members">
												<a href="#" data-toggle="tooltip" title="Jeffery Lalor" class="avatar">
													<img src="assets/img/profiles/avatar-16.jpg" alt="">
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Add Team</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Team Members</label>
											<div class="project-members">
												<a href="#" data-toggle="tooltip" title="John Doe" class="avatar">
													<img src="assets/img/profiles/avatar-16.jpg" alt="">
												</a>
												<a href="#" data-toggle="tooltip" title="Richard Miles" class="avatar">
													<img src="assets/img/profiles/avatar-09.jpg" alt="">
												</a>
												<a href="#" data-toggle="tooltip" title="John Smith" class="avatar">
													<img src="assets/img/profiles/avatar-10.jpg" alt="">
												</a>
												<a href="#" data-toggle="tooltip" title="Mike Litorus" class="avatar">
													<img src="assets/img/profiles/avatar-05.jpg" alt="">
												</a>
												<span class="all-team">+2</span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea rows="4" class="form-control summernote" placeholder="Enter your message here"></textarea>
								</div>
								<div class="form-group">
									<label>Upload Files</label>
									<input class="form-control" type="file">
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /Create Project Modal -->

			<!-- Edit Project Modal -->
			<!-- <div id="edit_project" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Edit Project</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Project Name</label>
											<input class="form-control" value="Project Management" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Client</label>
											<select class="select">
												<option>Global Technologies</option>
												<option>Delta Infotech</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Start Date</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text">
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>End Date</label>
											<div class="cal-icon">
												<input class="form-control datetimepicker" type="text">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3">
										<div class="form-group">
											<label>Rate</label>
											<input placeholder="$50" class="form-control" value="$5000" type="text">
										</div>
									</div>
									<div class="col-sm-3">
										<div class="form-group">
											<label>&nbsp;</label>
											<select class="select">
												<option>Hourly</option>
												<option selected>Fixed</option>
											</select>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Priority</label>
											<select class="select">
												<option selected>High</option>
												<option>Medium</option>
												<option>Low</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Add Project Leader</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Team Leader</label>
											<div class="project-members">
												<a href="#" data-toggle="tooltip" title="Jeffery Lalor" class="avatar">
													<img src="assets/img/profiles/avatar-16.jpg" alt="">
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<label>Add Team</label>
											<input class="form-control" type="text">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<label>Team Members</label>
											<div class="project-members">
												<a href="#" data-toggle="tooltip" title="John Doe" class="avatar">
													<img src="assets/img/profiles/avatar-16.jpg" alt="">
												</a>
												<a href="#" data-toggle="tooltip" title="Richard Miles" class="avatar">
													<img src="assets/img/profiles/avatar-09.jpg" alt="">
												</a>
												<a href="#" data-toggle="tooltip" title="John Smith" class="avatar">
													<img src="assets/img/profiles/avatar-10.jpg" alt="">
												</a>
												<a href="#" data-toggle="tooltip" title="Mike Litorus" class="avatar">
													<img src="assets/img/profiles/avatar-05.jpg" alt="">
												</a>
												<span class="all-team">+2</span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Description</label>
									<textarea rows="4" class="form-control" placeholder="Enter your message here"></textarea>
								</div>
								<div class="form-group">
									<label>Upload Files</label>
									<input class="form-control" type="file">
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /Edit Project Modal -->

			<!-- Delete Project Modal -->
			<!-- <div class="modal custom-modal fade" id="delete_project" role="dialog">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<div class="modal-body">
							<div class="form-header">
								<h3>Delete Project</h3>
								<p>Are you sure want to delete?</p>
							</div>
							<div class="modal-btn delete-action">
								<div class="row">
									<div class="col-6">
										<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
									</div>
									<div class="col-6">
										<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<!-- /Delete Project Modal -->

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

	
	<!-- Custom JS -->
	<script src="../../assets/js/app.js"></script>
	<script src="../../assets/plugins/summernote/summernote-bs4.min.js"></script>
	<script src="../../assets/js/custom/Project/project.js"></script>
</body>

</html>