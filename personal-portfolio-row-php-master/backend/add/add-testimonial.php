
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
					<h3 class="page-title">Add testimonials</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Add testimonials</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-xl-8 d-flex">
				<div class="card">
					<div class="card-body">

						<!-- Add details -->
							<div class="blog-details">
								<form action="../action/add-testimonial-action.php" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<div class="">
											<img class="comment_client_img" id="image_id" alt="User Image"
											src="../upload/defult-img/profile-img.png">
											<span>Select Client Image</span>
										</div>
											<input class="upload_btn" id="photo" type="file" name="photo" onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">
									</div>
									<div class="form-group">
										<label>Name</label>
										<input class="form-control" type="text" name="name">
									</div>
									<div class="form-group">
										<label>Rank</label>
										<input class="form-control" type="text" name="rank">
									</div>
									<div class="form-group">
										<label>Comment</label>
										<textarea cols="30" rows="6" class="form-control" name="comment"></textarea>
									</div>
									<div class="form-group">
										<label class="display-block w-100">Comment Status</label>
										<div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="active"
													name="comment_status" value="active" type="radio" checked="">
												<label class="custom-control-label" for="active">Active</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="inactive"
													name="comment_status" value="inactive" type="radio">
												<label class="custom-control-label"
													for="inactive">Inactive</label>
											</div>
										</div>
									</div>
									<div class="m-t-20 text-center">
										<button class="btn btn-primary btn-lg">Publish Comment</button>
									</div>
								</form>
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
