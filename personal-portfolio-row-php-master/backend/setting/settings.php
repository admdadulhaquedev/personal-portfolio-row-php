<?php 

	include_once '../inc/header.php';
	include_once '../inc/session.php';
 ?>

	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content container-fluid">

			<!-- Tab Menu -->
			<nav class="user-tabs mb-4 custom-tab-scroll">
				<ul class="nav nav-tabs nav-tabs-bottom nav-justified">
					<li>
						<a class="nav-link active" href="#generalsettings" data-toggle="tab">General Settings</a>
					</li>

					<li>
						<a class="nav-link" href="#sociallogin" data-toggle="tab">Social Login</a>
					</li>
				</ul>
			</nav>
			<!-- /Tab Menu -->

			<!-- Tab Content -->
			<div class="tab-content">

				<!-- General -->
				<div role="tabpanel" id="generalsettings" class="tab-pane fade show active">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">General Settings</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
									<li class="breadcrumb-item active">General Settings</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">General</h4>
								</div>
								<div class="card-body">
									<form action="../action/setting-action.php" enctype="multipart/form-data" method="POST">

										<div class="form-group">
											<label>Website Name</label>
											<input type="text" class="form-control" name="website_name">
										</div>
										<div class="form-group">
											<label>Website Logo White</label>
											<input type="file" class="form-control" name="logo_white">
											<small class="text-secondary">
											
											</small>
										</div>

										<div class="form-group">
											<label>Website Logo Black</label>
											<input type="file" class="form-control" name="logo_black">
											<small class="text-secondary">Recommended image size is <b>150px x
													150px</b></small>
										</div>

										<div class="form-group mb-0">
											<label>Favicon</label>
											<input type="file" class="form-control" name="favicon">
											<small class="text-secondary">Recommended image size is <b>16px x
													16px</b> or <b>32px x 32px</b></small><br>
											<small class="text-secondary">Accepted formats : only png and
												ico</small>
										</div>
										<div class="text-center">
											<button type="submit" class="btn btn-primary">Public</button>
										</div>	

									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /General -->

				<!-- Social Login -->
				<div role="tabpanel" id="sociallogin" class="tab-pane fade">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Social Login</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
									<li class="breadcrumb-item active">Social Login</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="card shadow-none">
						<div class="card-header">
							<h4 class="card-title">Social Login</h4>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Facebook App ID</label>
								<input type="text" class="form-control mb-2" id="website_facebook_app_id"
									name="website_facebook_app_id" value="506928406484271">
								<a href="https://www.codexworld.com/create-facebook-app-id-app-secret/"
									target="_blank">How to Create facebook app id?</a>
							</div>
							<div class="form-group">
								<label>Google Client ID</label>
								<input type="text" class="form-control mb-2" id="website_google_client_id"
									name="website_google_client_id"
									value="387823802376-7e1kr704s4o39a8cqtdmd6jeaob636tu.apps.googleusercontent.com">
								<a href="https://www.codexworld.com/create-google-developers-console-project/"
									target="_blank">How to Create google client id?</a>
							</div>
						</div>
						<div class="card-body pt-0">
							<button name="form_submit" type="submit" class="btn btn-primary" value="true">Save
								Changes</button>
						</div>
					</div>
				</div>
				<!-- /Social Login -->

			</div>
			<!-- /Tab Content -->

		</div>
	</div>
	<!-- /Page Wrapper -->

<?php 
	include_once '../inc/footer.php';
 ?>
