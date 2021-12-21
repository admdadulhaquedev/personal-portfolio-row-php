
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
					<h3 class="page-title">Add Counter Item</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Add Counter Item</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Add Counter Item</h4>
						<form action="../action/add-counter-item-action.php" method="POST">
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group row">
										<label class="col-lg-4 col-form-label">Icon</label>
										<div class="col-lg-8">
											<select class="select select2-hidden-accessible form-control"
													tabindex="-1" aria-hidden="true" name="icon">
												<option value >Select One</option>
												<option value="flaticon-award">Feature Item</option>
												<option value="flaticon-like">Active Products</option>
												<option value="flaticon-event">Year Experience</option>
												<option value="flaticon-woman">Our Clients</option>
											</select>					
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-4 col-form-label">Count Number</label>
										<div class="col-lg-8">
											<input type="number" class="form-control" name="count_number">
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group row">
										<label class="col-lg-4 col-form-label">Title</label>
										<div class="col-lg-8">
											<input class="form-control titleborder" type="text" name="title">
										</div>
									</div>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Add Item</button>
							</div>
						</form>
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
