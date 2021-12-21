
<?php 
	include_once '../inc/header.php';

    $category_select = "SELECT * FROM categories WHERE status = 1 ORDER BY id DESC";
    $category_sq = mysqli_query($db, $category_select);
 
 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Categories</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Categories</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-lg-12">
				<div class="card">

					<form action="#" method="POST">
					
						<div class="card-header d-flex">
							<h4 class="card-title">Category List's</h4>
							<button class="btn btn-primary" id="submit_prog" type="submit" name="delete">Delete Seletected</button>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-nowrap mb-0">
									<?php 
									    if (mysqli_fetch_assoc($category_sq) > 0) {
									?>
									<thead>
										<tr>
											<th>LS</th>
											<th class="checkbox text-center">
												<input class="prog" id="checkAll" type="checkbox" name="mess_id[]">
											</th>
											<th>Category Name</th>
											<th>Status</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody>
		                            	<?php foreach ($category_sq as $key => $category): ?>
										<tr class="">

											<td><?php echo $key + 1 ?></td>
											<td class="checkbox text-center">
												<input class="prog" type="checkbox" name="mess_id[]" value="<?php echo $category["id"] ?>">
											</td>
											<td data-id="<?php echo $message["id"] ?>" class="">
												<?php echo $category["name"] ?>
											</td>
											<td data-id="<?php echo $message["id"] ?>" class=""> 
												<?php if($category["status"] == 1){echo "Active";}else{echo "Inactive";} ?>
											</td>
											<td class="text-center">
												<a href="../delete-action/message-delete-action.php?id=<?php echo $message["id"]?>">
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

		// For Seen Unseen
		// $('.clickable').click(function(){
		// 	var messageID = $(this).attr("data-id");
		// 	window.location.href = "../action/update-message-status-action.php?id="+messageID;
		// })

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