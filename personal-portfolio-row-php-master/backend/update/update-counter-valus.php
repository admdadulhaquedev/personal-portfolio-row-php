
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
					<h3 class="page-title">Update Counter Valus</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Update Counter Valus</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<h4 class="card-title">Update Counter Valus</h4>
						<form action="../action/update-counter-valus-action.php">
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group row">
										<label class="col-lg-4 col-form-label">Feature Item</label>
										<div class="col-lg-8">
											<input type="number" class="form-control" name="item">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-4 col-form-label">Active Products</label>
										<div class="col-lg-8">
											<input type="number" class="form-control" name="product">
										</div>
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group row">
										<label class="col-lg-4 col-form-label">Year Experience</label>
										<div class="col-lg-8">
											<input type="number" class="form-control" name="year">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-4 col-form-label">Our Clients</label>
										<div class="col-lg-8">
											<input type="number" class="form-control" name="client">
										</div>
									</div>
								</div>
							</div>
							<div class="text-right">
								<button type="submit" class="btn btn-primary">Update</button>
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







