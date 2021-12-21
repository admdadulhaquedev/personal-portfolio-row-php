
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
					<h3 class="page-title">Add Education</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Add Education</li>
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
								<form action="../action/add-education-action.php" method="POST">
									<div class="form-group">
										<label>Education Year</label>
										<select class="select select2-hidden-accessible form-control"
											tabindex="-1" aria-hidden="true" name="education_year">
											<option value >Select One</option>
											<?php 
										   		for($i = 2000 ; $i <= date('Y'); $i++){
										      		echo "<option>$i</option>";
										   		}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Education Title</label>
										<input class="form-control titleborder" type="text" name="education_title">
										<span class="text-danger text-capitalize">
											<?php 
												if (isset($_SESSION['education_year'])) {
											?>
											<style type="text/css">
												.titleborder{
													border: 1px solid red;
												}
											</style>
											<?php
												echo $_SESSION['education_year'];
												session_unset();
												}
											 ?>
										</span>
									</div>
									<div class="form-group">
										<label>Education Progress</label>
										<input type="text" id="pct" class="form-control" name="education_progress">
										<span class="form-text text-muted">e.g "99%"</span>
									</div>
									<div class="form-group">
										<label class="display-block w-100">Education Status</label>
										<div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="active"
													name="education_status" value="active" type="radio" checked="">
												<label class="custom-control-label" for="active">Active</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="inactive"
													name="education_status" value="inactive" type="radio">
												<label class="custom-control-label"
													for="inactive">Inactive</label>
											</div>
										</div>
									</div>
									<div class="m-t-20 text-center">
										<button class="btn btn-primary btn-lg">Publish Education</button>
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







