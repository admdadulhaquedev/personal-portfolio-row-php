<?php 
	// require_once "../inc/session.php";
	require_once '../inc/header.php';
	// require_once 'database.php';
	$user_id = $_SESSION["user_id"];
	$select = "SELECT * FROM users WHERE id = '$user_id'";
	$sq = mysqli_query($db, $select);
	$assoc = mysqli_fetch_assoc($sq);

	// Contuct Select
	$contuct_select = "SELECT * FROM contact_information";
	$contuct_q = mysqli_query($db, $contuct_select);
	$contact_assco = mysqli_fetch_assoc($contuct_q);

 ?>

	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content container-fluid">

			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col">
						<h3 class="page-title">My Profile</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="../deshbord/deshbord.php">Dashboard</a>
							</li>
							<li class="breadcrumb-item active">My Profile</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-md-12">
					<div class="profile-header">
						<div class="row align-items-center">
							<div class="col-auto profile-image">
								<form action="../action/profile-img-upload-action.php" method="POST" enctype="multipart/form-data">
									<a href="#">
										<img class="rounded-circle" id="image_id" alt="User Image"
										src="../upload/<?php echo $assoc["photo"]?>">
									</a>
									<div class="upload-img">
										<input class="upload_btn" id="photo" type="file" name="photo" onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">
										<label for="photo">
											<p>upload</p>
										</label>
									</div>
									<button class="images-submit" type="submit">Update Image</button>
								</form>
							</div>
							<div class="col ml-md-n2 profile-user-info">
								<h4 class="user-name mb-0"><?php echo $assoc["name"] ?></h4>
								<h6 class="text-muted"><?php echo $assoc["email"] ?></h6>
								<div class="pb-3">
									<i class="fas fa-map-marker-alt"></i>
									<?= $contact_assco["address"] ?>
								</div>
								<div class="about-text">
									<?= $assoc["about_me"] ?>
								</div>
							</div>
							<div class="col-auto profile-btn">
							</div>
						</div>
					</div>
					<div class="profile-menu">
						<ul class="nav nav-tabs nav-tabs-solid">
							<li class="nav-item">
								<a class="nav-link <?php if (!isset($_SESSION["change_password"])) {
									echo "active";
								} ?>" data-toggle="tab" href="#per_details_tab">About</a>
							</li>
							<li class="nav-item">
								<a class="nav-link <?php if (isset($_SESSION["change_password"])) {
									echo "active";
								} ?>" data-toggle="tab" href="#password_tab">Password</a>
							</li>
						</ul>
					</div>
					<div class="tab-content profile-tab-cont">
	
						<!-- Personal Details Tab -->
						<div class="tab-pane fade show <?php if (!isset($_SESSION["change_password"])) {
									echo "active";
								} ?>" id="per_details_tab"> 
								

							<!-- Personal Details -->
							<div class="row">
								<div class="col-lg-12">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title d-flex justify-content-between">
												<span>Personal Details</span>
												<a class="edit-link" data-toggle="modal" href="#edit_personal_details">
													<i class="fa fa-edit mr-1"></i>
													Edit
												</a>
											</h5>
											<div class="row">
												<p class="col-sm-2 text-muted mb-0 mb-sm-3">Name</p>
												<p class="col-sm-10"><?php echo $assoc["name"] ?></p>
											</div>
											<div class="row">
												<p class="col-sm-2 text-muted mb-0 mb-sm-3">Address</p>
												<p class="col-sm-10"><?= $assoc["address"] ?></p>
											</div>
											<div class="row">
												<p class="col-sm-2 text-muted mb-0 mb-sm-3">Email ID</p>
												<p class="col-sm-10"><?php echo $assoc["email"] ?></p>
											</div>
											<div class="row">
												<p class="col-sm-2 text-muted mb-0 mb-sm-3">Mobile</p>
												<p class="col-sm-10"><?php echo $assoc["phone"] ?></p>
											</div>
										</div>
									</div>


								</div>


							</div>
							<!-- /Personal Details -->

						</div>
						<!-- /Personal Details Tab -->

						<!-- Change Password Tab -->
						<div id="password_tab" class="tab-pane fade show <?php if (isset($_SESSION["change_password"])) {
									echo "active";
								} ?>">

							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Change Password</h5>
									<div class="row">
										<div class="col-md-10 col-lg-6">
											<form action="change-password-action.php" method="POST">
												<div class="form-group">
													<label>Old Password</label>
													<input type="text" name="old_password" value="<?php if(isset($_SESSION["old_passwordvalue"])){echo $_SESSION["old_passwordvalue"];$_SESSION["old_password"] = "";} ?>" class="form-control old_passwordalert">
													<span class="text-danger text-capitalize">
														<?php 
															if (isset($_SESSION["old_password"])) {
														?>
														<style type="text/css">
														.old_passwordalert{
															border: 1px solid red;
														}
														</style>
														<?php
															echo $_SESSION["old_password"];

															$_SESSION["old_password"] = "";
															}
													 	?>
													</span>
												</div>
												<div class="form-group">
													<label>New Password</label>
													<input type="text" name="new_password" class="form-control new_passwordalert">
													<span class="text-danger text-capitalize">
														<?php 
															if (isset($_SESSION["new_password"])) {
														?>
														<style type="text/css">
														.new_passwordalert{
															border: 1px solid red;
														}
														</style>
														<?php
															echo $_SESSION["new_password"];

															$_SESSION["new_password"] = "";
															}
													 	?>
													</span>
												</div>
												<div class="form-group">
													<label>Confirm Password</label>
													<input type="text" name="cnew_password" class="form-control cnew_passwordalert">
													<span class="text-danger text-capitalize">
														<?php 
															if (isset($_SESSION["cnew_password"])) {
														?>
														<style type="text/css">
														.cnew_passwordalert{
															border: 1px solid red;
														}
														</style>
														<?php
															echo $_SESSION["cnew_password"];
															$_SESSION["cnew_password"] = "";
															}
													 	?>
													</span>
												</div>
												<button class="btn btn-primary" type="submit">Save Changes</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /Change Password Tab -->

					</div>
				</div>
			</div>

		</div>
	</div>
	<!-- /Page Wrapper -->


	<!-- Edit Details Modal -->
	<div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<style>
				.modal-content{
					padding-bottom: 15px;
				}
			</style>
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Personal Details</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row form-row">
							<div class="col-12 col-sm-12">
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" value="<?php echo $assoc["name"] ?>">
								</div>
							</div>
							
							<div class="col-12 col-sm-6">
								<div class="form-group">
									<label>Email ID</label>
									<input type="email" class="form-control" value="<?php echo $assoc["email"] ?>">
								</div>
							</div>
							<div class="col-12 col-sm-6">
								<div class="form-group">
									<label>Mobile</label>
									<input type="text" value="<?= $contact_assco["phone"] ?>" class="form-control">
								</div>
							</div>
							<div class="col-12">
								<h5 class="form-title">
									<span>Address</span>
								</h5>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label>Address</label>
									<input type="text" class="form-control" value="<?= $contact_assco["address"] ?>">
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<label>About Me</label>
									<textarea class="form-control" name="about_me" id="" cols="30" rows="5">
										<?= $assoc["about_me"] ?>
									</textarea>
								</div>
							</div>
							</div>
						</div>
						<button type="submit" class="btn btn-primary btn-block">Save Changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /Edit Details Modal -->



<?php 
	require_once '../inc/footer.php';
 ?>