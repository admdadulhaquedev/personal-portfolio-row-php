
<?php 
	include_once '../inc/session.php';
	include_once '../inc/header.php';
	include_once '../inc/database.php';

	$contuct_select = "SELECT * FROM contact_information";
	$contuct_q = mysqli_query($db, $contuct_select);
	$contact_assco = mysqli_fetch_assoc($contuct_q);
 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">

	<div class="content container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col">
					<h3 class="page-title">Contuct Information</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Contuct Information</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Contuct Information</h4>
					</div>
					<div class="card-body">
						<form action="../action/edit-contuct-info-action.php" method="POST">

							<div class="form-group">
								<input type="hidden" value="<?= $contact_assco["id"] ?>" name="id">
							</div>
							<div class="form-group">
								<label>Contuct Description : </label>
								<textarea cols="30" rows="6" class="form-control" name="description">
									<?= $contact_assco["contuct_desc"] ?>
								</textarea>
							</div>
							<div class="form-group">
								<label>Address: </label>
								<input type="text" class="form-control" value="<?= $contact_assco["address"] ?>" name="address">
							</div>
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Update Address</button>
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
