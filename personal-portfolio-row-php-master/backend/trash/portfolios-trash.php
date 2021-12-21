<?php 
	include_once '../inc/header.php';

    $portfolios_select = "SELECT * FROM portfolios INNER JOIN categories ON portfolios.category_id = categories.id WHERE portfolios.status = 2";
    $portfolios_sq = mysqli_query($db, $portfolios_select);
             
 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">
		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Portfolios</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Portfolios</li>
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
								if(mysqli_fetch_assoc($portfolios_sq) > 0) {
							?>
								<?php foreach ($portfolios_sq as $key => $protfolio): ?>
								<div class="col-lg-4 col-md-6 pitem">
		                            <div class="speaker-box">
										<div class="speaker-thumb">
											<img src="../upload/portfolio-img/thumbnail/<?= $protfolio["thumbnail"] ?>" alt="img">
										</div>
										<div class="speaker-overlay">
											<span><?= $protfolio["name"] ?></span>
											<h4>
		                                        <a href="portfolio-single.html"><?= $protfolio["title"] ?></a>
		                                    </h4>
											<a href="portfolio-single.html" class="arrow-btn">
		                                        More information 
		                                        <span></span>
		                                    </a>
										</div>
										<a class="undo_btn" href="#">
											<i class="fa fa-redo-alt"></i>
										</a>
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


