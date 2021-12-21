
<?php 
	include_once '../inc/header.php';

    $counter_select = "SELECT * FROM counter";
    $counter_sq = mysqli_query($db, $counter_select);


 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Counter</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Counter</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title">Counter Item's</h4>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-nowrap mb-0">

								<thead>
									<tr>
										<th>LS</th>
										<th>Icon</th>
										<th>Title</th>
										<th>Count Value</th>
										<th>Edit</th>
										<th>Delete</th>
									</tr>
								</thead>

								<tbody>
	                            	<?php foreach ($counter_sq as $key => $counter): ?>
										<tr>
											<td><?php echo $key + 1 ?></td>
											<td><i class="<?php echo str_replace(array("flaticon"), 'fa fa', $counter["icon"]) ?>"></i></td>
											<td><?php echo $counter["title"] ?></td>
											<td><?php echo $counter["count_number"] ?></td>
											<td>
												<a href="../edit/edit-counter-item.php?id=<?php echo $counter["id"]  ?>">
													<i class="far fa-edit"></i>
												</a>
											</td>
											<td>
												<a href="">
													<i class="far fa-trash-alt"></i>
												</a>
											</td>
										</tr>
	                            	<?php endforeach ?>
								</tbody>

							</table>
						</div>
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

