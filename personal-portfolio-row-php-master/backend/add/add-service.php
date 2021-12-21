
<?php 
	include_once '../inc/header.php';
	include_once '../inc/database.php';
	include_once '../inc/session.php';
 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Add Service</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Add Service</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">

						<!-- Add details -->
						<div class="row">
							<div class="col-12 blog-details">
								<form action="../action/add-service-action.php" method="POST">
									<div class="form-group">
										<label>Service Title</label>
										<input class="form-control titleborder" type="text" name="title">
										<span class="text-danger text-capitalize">
											<?php 
												if (isset($_SESSION['title'])) {
											?>
											<style type="text/css">
												.titleborder{
													border: 1px solid red;
												}
											</style>
											<?php
												echo $_SESSION['title'];
												session_unset();
												}
											 ?>
										</span>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Service Icon</label>
												<select class="select select2-hidden-accessible form-control"
													tabindex="-1" aria-hidden="true" name="icon">
													<option value >Select One</option>
													<option value="fab fa-react">Creative Design</option>
													<option value="fab fa-free-code-camp">Unlimited Features</option>
													<option value="fal fa-desktop">Ultra Responsive</option>
													<option value="fal fa-lightbulb-on">Creative Ides</option>
													<option value="fal fa-edit">Easy Customaization</option>
													<option value="fal fa-headset">Supper Support</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label>Service Description</label>
										<textarea cols="30" rows="6" class="form-control" name="description"></textarea>
									</div>
									<div class="form-group">
										<label class="display-block w-100">Service Status</label>
										<div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="active"
													name="active_service" value="active" type="radio" checked="">
												<label class="custom-control-label" for="active">Active</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="inactive"
													name="active_service" value="inactive" type="radio">
												<label class="custom-control-label"
													for="inactive">Inactive</label>
											</div>
										</div>
									</div>
									<div class="m-t-20 text-center">
										<button class="btn btn-primary btn-lg">Publish Service</button>
									</div>
								</form>
							</div>
						</div>
						<!-- /Add details -->

					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<!-- /Page Wrapper -->


<?php 
	include_once '../inc/footer.php';
 ?>
