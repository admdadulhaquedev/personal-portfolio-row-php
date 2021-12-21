
<?php 
	include_once '../inc/header.php';

 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Add Patner</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Add Patner</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<!-- Page Body -->
		<form action="../action/add-patner-action.php" enctype="multipart/form-data" method="POST">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Patner Image Upload</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label for="file">Select Image</label>
										<input onchange="document.getElementById('patner-img').src = window.URL.createObjectURL(this.files[0])" type="file" id="file" class="form-control"  name="photo">
										<small class="text-secondary">
											Recommended image size is <b>150px x
												150px</b>
										</small>
									</div>
								</div>

								<div class="col-xl-6">
									<div class="form-group image">
										<div class="patner_img">
											<img class="img w-100" src="../upload/defult-img/partner.png" id="patner-img" alt="Patner Image">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="row">
				<div class="col-12">
					<div class="m-t-20 m-b-20 text-center">
						<button class="btn btn-primary btn-lg">Add Patner</button>
					</div>
				</div>
			</div>
		</form>
		<!-- /Page Body -->
	</div>
</div>
<!-- /Page Wrapper -->

<?php 
	include_once '../inc/footer.php';
 ?>
