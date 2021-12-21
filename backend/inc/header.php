<?php 
	require_once 'session.php';
	require_once 'database.php';

	// $user_id = $_SESSION["user_id"];

	//For User Data
	$select = "SELECT * FROM users";
	$sq = mysqli_query($db, $select);
	$assoc = mysqli_fetch_assoc($sq);

	//For Counter Data
	$cselect = "SELECT COUNT(*) as total FROM counter";
	$cq = mysqli_query($db, $cselect);
	$cassoc = mysqli_fetch_assoc($cq);

	//For Messages Data in Notification
	$mselect = "SELECT COUNT(*) as total, id, name, email, send_time, status FROM messages WHERE seen_status = 1";
	$mq = mysqli_query($db, $mselect);
	$massoc = mysqli_fetch_assoc($mq);


	//For Messages Data in Notification
	$mselect2 = "SELECT * FROM messages WHERE seen_status = 1 ORDER BY id DESC";
	$mq2 = mysqli_query($db, $mselect2);


	//For Address Data
	$aselect = "SELECT COUNT(*) as total FROM contact_information";
	$aq = mysqli_query($db, $aselect);
	$aassoc = mysqli_fetch_assoc($aq);

	//For Social Data
	$social_select = "SELECT COUNT(*) as total FROM social_links";
	$social_q = mysqli_query($db, $social_select);
	$social_assoc = mysqli_fetch_assoc($social_q);

	//Get URL
	$self = $_SERVER['PHP_SELF'];
	$exp = explode("/", $self);
	$url = end($exp);

    // $root_derictory = $_SERVER['DOCUMENT_ROOT'];

    // echo $root_derictory;

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Project - Blank Page</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.png">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">

	<!-- Google Font CSS -->
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

	<!-- Feathericon CSS -->
	<link rel="stylesheet" href="../assets/css/feather.css">
	<link rel="stylesheet" href="../assets/plugins/morris/morris.css">
	<link rel="stylesheet" href="../assets/css/select2.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

	<!-- Main Wrapper -->
	<div class="main-wrapper">

		<!-- Header -->
		<div class="header">

			<!-- Logo -->
			<div class="header-left">
				<a href="index.php" class="logo">
					<img src="../assets/img/logo-white.png" alt="Logo">
				</a>
				<a href="index.php" class="logo logo-small">
					<img src="../assets/img/logo-small.png" alt="Logo" width="30" height="30">
				</a>
			</div>
			<!-- /Logo -->

			<a href="javascript:void(0);" id="toggle_btn"> <i class="fas fa-bars"></i>
			</a>
			<div class="top-nav-search">
				<form>
					<input type="text" class="form-control" placeholder="Search here">
					<button class="btn" type="submit">
						<i class="feather-search"></i>
					</button>
				</form>
			</div>

			<!-- Mobile Menu Toggle -->
			<a class="mobile_btn" id="mobile_btn"> 
				<i class="fas fa-bars"></i>
			</a>
			<!-- /Mobile Menu Toggle -->

			<!-- Header Right Menu -->
			<ul class="nav user-menu">
				<!-- Flag -->
				<li class="nav-item dropdown has-arrow flag-nav mr-2">
					<a class="nav-link dropdown-toggle align-items-center" data-toggle="dropdown" href="#"
						role="button">
						<img src="../assets/img/flags/us-1.png" alt="" width="24" height="16" class="lang-flag mr-1">
						English
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="../assets/img/flags/us.png" alt="" height="16"> English
						</a>
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="../assets/img/flags/fr.png" alt="" height="16"> French
						</a>
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="../assets/img/flags/es.png" alt="" height="16"> Spanish
						</a>
						<a href="javascript:void(0);" class="dropdown-item">
							<img src="../assets/img/flags/de.png" alt="" height="16"> German
						</a>
					</div>
				</li>
				<!-- /Flag -->

				<!-- Fullscreen -->
				<li class="nav-item dropdown">
					<a href="#" id="btnFullscreen" class=" ">
						<i class="feather-maximize"></i>
					</a>
				</li>
				<!-- /Fullscreen -->

				<!-- Notifications -->
				<li class="nav-item dropdown noti-dropdown">

					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<i class="feather-bell"></i>

						<span style="display: <?php if ($massoc["total"] > 0) {echo "block";}else{echo "none";} ?>;" class="badge badge-pill"><?php echo $massoc["total"]; ?>
						</span>

					</a>

					<div class="dropdown-menu notifications">
						<div class="topnav-dropdown-header">
							<span class="notification-title">Notifications</span>
							<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
						</div>
						<div class="noti-content">
							<ul class="notification-list">

								<?php foreach ($mq2 as $key => $message): ?>

								<li class="notification-message">
									<a href="../action/update-message-status-action.php?id=<?php echo $message["id"] ?>">
										<div class="media">
											<span class="avatar avatar-sm">
												<i class="fa fa-envelope"></i>
											</span>
											<div class="media-body">
												<p class="noti-details">
													<span class="noti-title">
														<?php echo $message["name"] ?>
													</span>
												</p>
												<p class="noti-time">
													<span class="notification-time">
														<?php echo $message["send_time"] ?>
													</span>
												</p>
											</div>
										</div>
									</a>
								</li>

								<?php endforeach ?>

							</ul>
						</div>
						<div class="topnav-dropdown-footer">
							<a href="#">View all Notifications</a>
						</div>
					</div>

				</li>
				<!-- /Notifications -->

				<li class="nav-item dropdown has-arrow main-drop ml-3">
					<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
						<span class="user-img">
							<img src="../upload/<?php echo $assoc["photo"] ?>" alt=""> 
							Admin
							<span class="status online"></span>
						</span>
					</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="profile.php">
							<i class="feather-user"></i> 
							My Profile
						</a>
						<a class="dropdown-item" href="../action/log-out.php">
							<i class="feather-power"></i> 
							Logout
						</a>
					</div>
				</li>


			</ul>
			<!-- /Header Right Menu -->

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
						<li class="<?php if($url == "deshbord.php"){ echo "active";}else {echo "";} ?>">
							<a href="../deshbord/deshbord.php">
								<i class="feather-home"></i>
								<span>Dashboard</span>
							</a>
						</li>
						<li class="<?php if($url == "settings.php"){ echo "active";}else {echo "";} ?>">
							<a href="../setting/settings.php">
								<i class="feather-settings"></i>
								<span>Settings</span>
							</a>
						</li>

						<li class="menu-title">
							<span>Pages</span>
						</li>

						<!-- Profile -->
						<li class="<?php if($url == "profile.php"){ echo "active";}else {echo "";} ?>">
							<a href="../setting/profile.php">
								<i class="feather-user-plus"></i>
								<span>My Profile</span>
							</a>
						</li>
						<!-- Profile -->

						<!-- Messages -->
						<li class="submenu <?php if($url == "messages.php" || $url == "single-message.php"){ echo "active";}else {echo "";} ?>">
							<a href="#">
								<i class="feather-book-open"></i>
								<span>Messages</span> 
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "messages.php") {echo "active";} else {echo "";} ?>" href="../view-data/messages.php">Messages's</a>
								</li>

								<li style="display: <?php if ($url == "single-message.php") {echo "block";} else {echo "none";} ?>;">
									<a class="<?php if ($url == "single-message.php") {echo "active";} else {echo "";} ?>" href="#">Single Message</a>
								</li>
							</ul>
						</li>
						<!-- Messages -->

						<!-- Education -->
						<li class="submenu <?php if($url == "education.php" || $url == "add-education.php"|| $url == "edit-education.php"){ echo "active";}else {echo "";} ?>">
							<a href="#">
								<i class="feather-book-open"></i>
								<span>Education</span> 
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "education.php") {echo "active";} else {echo "";} ?>" href="../view-data/education.php">Education's</a>
								</li>
								<li>
									<a <?php if ($url == "add-education.php") {echo "active";} else {echo "";} ?> href="../add/add-education.php"> Add Education </a>
								</li>
								<li style="display: <?php 	if ($url == "edit-education.php") {echo "block";} else {echo "none";} ?>">

									<a class="<?php if ($url == "edit-education.php") {echo "active";} else {echo "";} ?>" href="#"> Edit Education </a>
								</li>
							</ul>
						</li>
						<!-- Education -->

						<!-- Service -->
						<li class="submenu <?php if ($url == "services.php") {echo "active";} else {echo " ";} ?> ">
							<a href="#">
								<i class="feather-book-open"></i>
								<span>Services</span> 
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "services.php") {echo "active";} else {echo "";} ?>" href="../view-data/services.php"> Services </a>
								</li>
								<li>
									<a href="blog-details.php"> Blog Details </a>
								</li>
								<li>
									<a class="<?php if ($url == "add-service.php") {echo "active";} else {echo "";} ?>" href="../add/add-service.php">Add Services </a>
								</li>
								<li>
									<a href="edit-blog.php"> Edit Services </a>
								</li>
							</ul>
						</li>
						<!-- Service -->


						<!-- Protfolios -->
						<li class="submenu <?php if ($url == "portfolios.php" || $url == "add-portfolio.php" || $url == "categories.php"|| $url == "add-categories.php") {echo "active";} else {echo " ";} ?> ">
							<a href="#">
								<i class="feather-book-open"></i>
								<span>Protfolios</span> 
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "portfolios.php") {echo "active";} else {echo "";} ?>" href="../view-data/portfolios.php"> Protfolios </a>
								</li>
								<li>
									<a href="blog-details.php"> Blog Details </a>
								</li>
								<li>
									<a class="<?php if ($url == "add-portfolio.php") {echo "active";} else {echo "";} ?>" href="../add/add-portfolio.php">Add Protfolio</a>
								</li>
								<li>
									<a class="<?php if ($url == "categories.php") {echo "active";} else {echo "";} ?>" href="../view-data/categories.php">
										Categories
									</a>
								</li>
								<li>
									<a class="<?php if ($url == "add-categories.php") {echo "active";} else {echo "";} ?>" href="../add/add-categories.php">
										Add Categories
									</a>
								</li>
							</ul>
						</li>
						<!-- /Protfolios -->


						<!-- Patner -->
						<li class="submenu <?php if ($url == "patners.php" || $url == "add-patner.php") {echo "active";} else {echo " ";} ?> ">
							<a href="#">
								<i class="feather-book-open"></i>
								<span>Patners</span> 
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "patners.php") {echo "active";} else {echo "";} ?>" href="../view-data/patners.php">Patners </a>
								</li>
								<li>
									<a class="<?php if ($url == "add-patner.php") {echo "active";} else {echo "";} ?>" href="../add/add-patner.php"> Add Patner </a>
								</li>
							</ul>
						</li>
						<!-- Patner -->
						

						<!-- Counter -->
						<li class="submenu <?php if ($url == "counter.php" || $url == "add-counter-item.php" || $url == "edit-counter-item.php") {echo "active";} else {echo "";} ?> ">
							<a href="#">
								<i class="fa fa-sort-amount-up"></i>
								<span>Counter</span> 
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "counter.php") {echo "active";} else {echo " ";} ?>" href="../view-data/counter.php"> Counter </a>
								</li>
								<li style="display: <?php 	if ( $cassoc["total"] < 4) {echo "block";} else {echo "none";} ?>">
									<a class="<?php if ($url == "add-counter-item.php") {echo "active";} else {echo "";} ?>" href="../add/add-counter-item.php">
									  Add Counter Item
									</a>
								</li>
								<li style="display: <?php 	if ($url == "edit-counter-item.php") {echo "block";} else {echo "none";} ?>">
									<a class="<?php if ($url == "edit-counter-item.php") {echo "active";} else {echo "";} ?>" href="#">
									  Edit Counter Item
									</a>
								</li>
							</ul>
						</li>
						<!-- Counter -->

						<!-- testimonials -->
						<li class="submenu <?php if ($url == "testimonials.php" || $url == "add-testimonials.php") {echo "active";} else {echo " ";} ?> ">
							<a href="#">
								<i class="feather-book-open"></i>
								<span>Testimonials</span> 
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "testimonials.php") {echo "active";} else {echo "";} ?>" href="../view-data/testimonials.php">Testimonials</a>
								</li>
								<li>
									<a class="<?php if ($url == "add-testimonial.php") {echo "active";} else {echo "";} ?>" href="../add/add-testimonial.php"> Add testimonials </a>
								</li>
							</ul>
						</li>
						<!-- testimonials -->

						<!-- Contuct-info -->
						<li class="submenu <?php if ($url == "contuct-info.php" || $url == "edit-contuct-info.php" || $url == "add-contuct-info.php") {echo "active";} else {echo " ";} ?>">
							<a href="#">
								<i class="feather-lock"></i>
								<span> Address</span> 
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "contuct-info.php") {echo "active";} else {echo "";} ?>" href="../view-data/contuct-info.php">Address</a>
								</li>
								<li style="display: <?php if ( $aassoc["total"] <= 0) {echo "none";} else {echo "block";} ?>">
									<a class="<?php if ($url == "edit-contuct-info.php") {echo "active";} else {echo "";} ?>" href="../edit/edit-contuct-info.php">Edit Address</a>
								</li>
								<lis style="display: <?php if ( $aassoc["total"] > 0) {echo "none";} else {echo "block";} ?>">
									<a class="<?php if ($url == "add-contuct-info.php") {echo "active";} else {echo "";} ?>" href="../add/add-contuct-info.php">Add Address</a>
								</li>
							</ul>
						</li>
						<!-- / Address -->

						<!-- Social Links -->
						<li class="submenu <?php if ($url == "social-info.php" || $url == "add-social-icon.php" || $url == "edit-social-icon.php") {echo "active";} else {echo " ";} ?>">
							<a href="#">
								<i class="feather-lock"></i>
								<span> Social Links</span> 
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "social-info.php") {echo "active";} else {echo " ";} ?>" href="../view-data/social-info.php">Social</a>
								</li>
								<li>
									<a class="<?php if ($url == "add-social-icon.php") {echo "active";} else {echo " ";} ?>" href="../add/add-social-icon.php">Add New</a>
								</li>
								<li style="display: <?php if ($url == "edit-social-icon.php") {echo "block";} else {echo "none";} ?>">
									<a class="<?php if ($url == "edit-social-icon.php") {echo "active";} else {echo " ";} ?>" href="../edit/edit-social-icon.php">Edit Social</a>
								</li>
							</ul>
						</li>
						<!-- / Social Links -->

						<!-- Authentication -->
						<li class="submenu">
							<a href="#">
								<i class="feather-lock"></i>
								<span> Authentication </span> 
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li><a href="login.php"> Login </a></li>
								<li><a href="register.php"> Register </a></li>
								<li><a href="forgot-password.php"> Forgot Password </a></li>
								<li><a href="lock-screen.php"> Lock Screen </a></li>
							</ul>
						</li>
						<!-- Authentication -->

						<!-- Error Page -->
						<li class="submenu <?php if ($url == "error-404.php"|| $url == "error-500.php") {echo "active";} else {echo " ";} ?>">
							<a href="#">
								<i class="feather-alert-octagon"></i>
								<span> Error Pages </span> 
								<span class="menu-arrow"></span>
								</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "error-404.php") {echo "active";} else {echo " ";} ?>" href="../error/error-404.php">404 Error </a>
								</li>
								<li>
									<a class="<?php if ($url == "error-500.php") {echo "active";} else {echo " ";} ?>" href="../error/error-500.php">500 Error </a>
								</li>
							</ul>
						</li>
						<!-- Error Page -->

						<!-- Blank Page -->
						<li class="<?php if ($url == "blank-page.php") {echo "active";} else {echo " ";} ?>">
							<a class="<?php if ($url == "blank-page.php") {echo "active";} else {echo " ";} ?>" href="../blank/blank-page.php">
								<i class="feather-file"></i>
								<span>Blank Page</span>
							</a>
						</li>
						<!-- Blank Page -->
						
						<!-- Trash Page -->
						<li class="submenu <?php if ($url == "services-trash.php" || $url == "education-trash.php" || $url == "testimonials-trash.php" || $url == "portfolios-trash.php") {echo "active";} else {echo " ";} ?>">
							 <!-- $url == 'services-trash.php' ? 'active' : $url == 'education-trash.php' ? 'active' : '' -->
							<a href="javascript:void(0);">
								<i class="far fa-trash-alt"></i>
								<span> Trash </span>
								<span class="menu-arrow"></span>
							</a>
							<ul style="display: none;">
								<li>
									<a class="<?php if ($url == "services-trash.php") {echo "active";} else {echo " ";} ?>" href="../trash/services-trash.php">Service Trash</a>
								</li>
								<li>
									<a class="<?php if ($url == "education-trash.php") {echo "active";} else {echo " ";} ?>" href="../trash/education-trash.php">Education Trash </a>
								</li>
								<li>
									<a class="<?php if ($url == "messages-trash.php") {echo "active";} else {echo " ";} ?>" href="../trash/messages-trash.php">Messages Trash </a>
								</li>
								<li>
									<a class="<?php if ($url == "testimonials-trash.php") {echo "active";} else {echo " ";} ?>" href="../trash/testimonials-trash.php">Testimonials Trash </a>
								</li>
								<li>
									<a class="<?php if ($url == "portfolios-trash.php") {echo "active";} else {echo " ";} ?>" href="../trash/portfolios-trash.php">Portfolios Trash </a>
								</li>
							</ul>
						</li>
						<!-- Trash Page -->

					</ul>
				</div>
			</div>
		</div>
		<!-- /Sidebar -->
