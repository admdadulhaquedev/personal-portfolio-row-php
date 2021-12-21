<?php 
	include_once '../inc/header.php';

    $patners_select = "SELECT * FROM patners";
    $patners_sq = mysqli_query($db, $patners_select);
             
 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Patners</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Patners</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">

						<!-- Patners list -->
						<div class="row">

							<?php 
								if (mysqli_fetch_assoc($patners_sq) > 0) {

							?>
								<?php foreach ($patners_sq as $key => $patner): ?>
								<div class="col-12 col-md-6 col-xl-4">
									<div class="course-box blog grid-blog">
										<div class="blog-image mb-0 text-center">
											<a href="blog-details.php">
												<i class="<?php ?>">
													<img src="../upload/patners_img/<?php echo $patner["image"] ?>">
												</i>
											</a>
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
						<!-- /Patners list -->

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
