
<?php 
	include_once '../inc/header.php';

    $service_select = "SELECT * FROM services WHERE status = 1";
    $service_sq = mysqli_query($db, $service_select);
             
 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Services</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Services</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">

						<!-- Blog list -->
						<div class="row">

							<?php 
								if (mysqli_fetch_assoc($service_sq) > 0) {

							?>

								<?php foreach ($service_sq as $key => $service): ?>
								<div class="col-12 col-md-6 col-xl-4">
									<div class="course-box blog grid-blog">
										<div class="blog-image mb-0 text-center">
											<a href="blog-details.php">
												<i class="<?php echo str_replace(array("fal"), 'fa', $service["icon"]) ?>"></i>
											</a>
										</div>
										<div class="course-content">
											<span class="course-title"><?php echo $service["title"] ?></span>
											<p><?php echo $service["description"] ?></p>
											<div class="row">
												<div class="col">
													<a href="edit-blog.php" class="text-success">
														<i class="far fa-edit"></i> Edit
													</a>
												</div>
												<div class="col text-right">
													<a href="../delete-action/service-delete-action.php?id=<?php echo $service["id"] ?>" class="text-danger">
														<i class="far fa-trash-alt"></i> Inactive
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php endforeach ?>


							<?php
								}
								else{
							?>
								<div class="col-12 col-md-6 col-xl-4">
									<h1>Data Not Found</h1>
								</div>
							<?php
								}

							 ?>
						</div>
						<!-- /Blog list -->

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
