
<?php 
	include_once '../inc/header.php';
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	$id = $_GET["id"];

	$education_select = "SELECT * FROM education WHERE id = $id";
	$eq = mysqli_query($db, $education_select);
	$assoc = mysqli_fetch_assoc($eq);

 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Edit Education</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Edit Education</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-body">

						<!-- Edit details -->
						<div class="row">
							<div class="col-12 blog-details">
								<form action="../action/edit-education-action.php" method="POST">
									<input type="hidden" name="id" value="<?php echo $assoc["id"] ?>">
									<div class="form-group">
										<label>Education Year</label>
										<select class="select select2-hidden-accessible form-control"
											tabindex="-1" aria-hidden="true" name="education_year">
											<option value="<?php echo $assoc['year'] ?>"><?php echo $assoc['year'] ?></option>
											<?php 
										   		for($i = 2000 ; $i <= date('Y'); $i++){
										      		echo "<option>$i</option>";
										   		}
											?>
										</select>
									</div>
									<div class="form-group">
										<label>Education Title</label>
										<input class="form-control titleborder" type="text" name="education_title" value="<?php echo $assoc["title"] ?>">
										
									</div>
									<div class="form-group">
										<label>Education Progress</label>
										<input type="text" id="pct" class="form-control" name="education_progress" value="<?php echo $assoc["progress_bar"] ?>">
										<span class="form-text text-muted">e.g "99%"</span>
									</div>
									<div class="form-group">
										<label class="display-block w-100">Education Status</label>
										<div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="active"
													name="education_status" value="active" type="radio"  <?php if ($assoc["status"] == "1") {
														echo " checked='' ";
													} ?>>
												<label class="custom-control-label" for="active">Active</label>
											</div>
											<div class="custom-control custom-radio custom-control-inline">
												<input class="custom-control-input" id="inactive"
													name="education_status" value="inactive" type="radio" <?php if ($assoc["status"] == "2") {
														echo " checked='' ";
													} ?>>
												<label class="custom-control-label"
													for="inactive">Inactive</label>
											</div>
										</div>
									</div>
									<div class="m-t-20 text-center">
										<button class="btn btn-primary btn-lg">Update Education</button>
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







