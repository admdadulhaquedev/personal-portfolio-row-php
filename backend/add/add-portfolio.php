
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
					<h3 class="page-title">Add Portfolio</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Add Portfolio</li>
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
								<form action="../action/add-portfolio-action.php" method="POST" enctype="multipart/form-data">
									<div class="form-group">
										<label>Title</label>
										<input class="form-control" id="title" type="text" name="title">
									</div>
									<div class="form-group">
										<label>Slug</label>
										<input class="form-control" id="slug" type="text" name="slug">
									</div>
									<div class="form-group">
										<label>Descriptoin</label>
										<textarea cols="30" rows="6" class="form-control" name="description"></textarea>
									</div>
									<div class="form-group">
										<?php 
											$category_select = "SELECT * FROM categories";
											$category_select_q = mysqli_query($db, $category_select);
										 ?>
										<label>Portfolio Category</label>
										<select class="select select2-hidden-accessible form-control"
											tabindex="-1" aria-hidden="true" name="category">
											<option value >Select One</option>
											<!-- loop for category name -->
											<?php foreach ($category_select_q as $key => $category): ?>
												<option value="<?= $category["id"] ?>">
													<?= $category["name"] ?>
												</option>
											<?php endforeach ?>
											<!-- /loop for category name -->
										</select>
									</div>
									<div class="form-group portfolio_th">
										<div class="image_input">
											<span>Select Portfolio Thumbnail</span>
											<input class="upload_btn" id="thumbnail" type="file" name="thumbnail" onchange="document.getElementById('thumbnail_img').src = window.URL.createObjectURL(this.files[0])">
										</div>
										<div class="show_image">
											<img class="thumbnail_img" id="thumbnail_img" alt="User Image"
											src="../upload/defult-img/profile-img.png">
										</div>
									</div>
									<div class="form-group portfolio_th">
										<div class="image_input">
											<span>Select Feature Image </span>
											<input class="upload_btn" id="feature_image" type="file" name="feature_image" onchange="document.getElementById('feature_img').src = window.URL.createObjectURL(this.files[0])">
										</div>
										<div class="show_image">
											<img class="thumbnail_img" id="feature_img" alt="User Image"
											src="../upload/defult-img/profile-img.png">
										</div>
									</div>

									<div class="form-group">
										<label class="display-block w-100">Portfolio Status</label>
										<div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="active"
													name="portfolio_status" value="1" type="radio" checked="">
												<label class="custom-control-label" for="active">Active</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="inactive"
													name="portfolio_status" value="2" type="radio">
												<label class="custom-control-label"
													for="inactive">Inactive</label>
											</div>
										</div>
									</div>
									<div class="m-t-20 text-center">
										<button type="submit" class="btn btn-primary btn-lg">Publish Portfolio</button>
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
