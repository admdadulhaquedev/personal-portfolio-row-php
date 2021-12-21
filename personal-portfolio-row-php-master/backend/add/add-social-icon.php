
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
					<h3 class="page-title">Add Social</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Add Social</li>
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
								<form action="../action/add-social-action.php" method="POST">
									<div class="form-group">
										<label>Name</label>
										<input class="form-control titleborder" type="text" name="name">
									</div>
									<div class="form-group">
										<label>Link</label>
										<input class="form-control titleborder" type="text" name="link">
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>Icon Name</label>
												<select class="select select2-hidden-accessible form-control"
													tabindex="-1" aria-hidden="true" name="icon_class">
													<option value >Select One</option>
													<option value="fab fa-facebook-f">Facbook Icon</option>
													<option value="fab fa-twitter">Twitter</option>
													<option value="fab fa-instagram">Instagram</option>
													<option value="fab fa-pinterest">Pinterest</option>
													<option value="fab fa-google-plus-square">Google</option>
													<option value="fab fa-envelope">Gnail</option>
													<option value="fab fa-behance">Behance</option>
													<option value="fab fa-dribbble-square">Dribbble</option>
													<option value="fab fa-facebook-messenger">Messenger</option>
													<option value="fab fa-github-square">Github</option>
													<option value="fab fa-linkedin-in">Linkedin</option>
												</select>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label class="display-block w-100">Status</label>
										<div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="active"
													name="item_status" value="active" type="radio" checked="">
												<label class="custom-control-label" for="active">Active</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="inactive"
													name="item_status" value="inactive" type="radio">
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
