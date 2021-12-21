
<?php 
	include_once '../inc/header.php';

    $social_select = "SELECT * FROM social_links";
    $social_sq = mysqli_query($db, $social_select);
 
 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Social Link</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Social Link</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-lg-12">
				<div class="card">

					<form action="../delete-action/multipul-messages-delete.php" method="POST">
					
						<div class="card-header d-flex">
							<h4 class="card-title">Social Link</h4>
							<button class="btn btn-primary" id="submit_prog" type="submit" name="delete">Delete Seletected</button>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-nowrap mb-0">
										<?php 

										    if (mysqli_fetch_assoc($social_sq) > 0) {
										    	
										?>
									<thead>
										<tr>
											<th>LS</th>
											<th class="checkbox text-center">
												<input class="prog" id="checkAll" type="checkbox" name="mess_id[]">
											</th>
											<th>Name</th>
											<th>Icon</th>
											<th>Link</th>
											<th>Edit</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody>
		                            	<?php foreach ($social_sq as $key => $social_link): ?>
										<tr class="">

											<td><?php echo $key + 1 ?></td>
											<td class="checkbox text-center">
												<input class="prog" type="checkbox" name="mess_id[]" value="<?php echo $social_link["id"] ?>">
											</td>
											<td data-id="<?php echo $social_link["id"] ?>"><?php echo $social_link["name"] ?></td>

											<td >
												<i class="<?php echo $social_link["icon"] ?>"></i>
											</td>
											<td >
												<?php echo $social_link["link"] ?>
											</td>
											<td class="text-center">
												<a href="../action/edit-link-action.php?id=">
													<i class="far fa-edit"></i>
												</a>
											</td>
											<td class="text-center">
												<a href="../action/delete-link-action.php?id=">
													<i class="far fa-trash-alt"></i>
												</a>
											</td>

										</tr>
		                            	<?php endforeach ?>

										<?php
										    }
										    else {
										    	?>
										    		<tr>
										    			<td>
										    				<h1>Data Not Found</h1>
										    			</td>
										    		</tr>
										    	<?php
										    }

										?>
									</tbody>
								</table>
							</div>
						</div>

					</form>

				</div>
			</div>
			
		</div>
	</div>
</div>
<!-- /Page Wrapper -->


<?php 
	include_once '../inc/footer.php';
 ?>

<script type="text/javascript">
	$(document).ready(function(){

		// For Multipul Delete
		$('#checkAll').click(function(){
			$('input:checkbox').not(this).prop('checked', this.checked);
		})
		var $submit = $("#submit_prog").hide(),
        $cbs = $('input[class="prog"]').click(function() {
            $submit.toggle( $cbs.is(":checked") );
        });

	})
</script>