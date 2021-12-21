
<?php 
	include_once '../inc/header.php';

    $testimonial_select = "SELECT * FROM testimonials WHERE status = 1 ORDER BY id DESC";
    $testimonial_sq = mysqli_query($db, $testimonial_select);

 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Testimonials</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Testimonials</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<div class="row">
			<div class="col-lg-12">
				<div class="card">

					<form action="../action/add-testimonial-action.php" method="POST" enctype="multipart/form-data">
					
						<div class="card-header d-flex">
							<h4 class="card-title">Testimonials List's</h4>
							<button class="btn btn-primary undo-action" data-id="undo" id="submit_prog2" type="submit" name="undo-action">
								Undo
							</button>
							<button class="btn btn-primary delete" id="submit_prog" type="submit" name="delete">	Delete Forever
							</button>
						</div>
						
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-nowrap mb-0">
									<?php 
										if (mysqli_fetch_assoc($testimonial_sq) > 0) {
									?>
										<thead>
											<tr>
												<th>LS</th>
												<th class="checkbox text-center">
													<input class="prog" id="checkAll" type="checkbox" name="mess_id[]">
												</th>
												<th>Profile</th>
												<th>Name</th>
												<th>Comment</th>
												<th>Rank</th>
												<th>Undo</th>
												<th class="text-center">Empty</th>
											</tr>
										</thead>
										<tbody>
			                            	<?php foreach ($testimonial_sq as $key => $testimonial): ?>
												<tr class="<?php if($testimonial["status"] == "1"){echo "unseen";} ?>">

													<td><?php echo $key + 1 ?></td>
													<td class="checkbox text-center">
														<input class="prog" type="checkbox" name="testimonial_id[]" value="<?php echo $testimonial["id"] ?>">
													</td>
													<td data-id="<?php echo $testimonial["id"] ?>" class="clickable">
														<span class="profile_img comment">
															<img src="../upload/testimonials_img/<?php echo $testimonial["profile_img"] ?>" alt="Profile image">
														</span>
													</td>
													<td data-id="<?php echo $testimonial["id"] ?>" class="clickable">
														<?php echo $testimonial["name"] ?>
													</td>
													<td data-id="<?php echo $testimonial["id"] ?>" class="clickable message_text">
														<?php echo $testimonial["comment"] ?>
													</td>
													<td data-id="<?php echo $testimonial["id"] ?>" class="clickable">
														<?php echo $testimonial["rank"] ?>
													</td>
													<td class="text-center">
														<a href="../undo-action/testimonial-undo-action.php?id=<?php echo $testimonial["id"]?>">
															<i class="fa fa-redo-alt"></i>
														</a>
													</td>
													<td class="text-center">
														<a class=" text-danger" href="../delete-forever/single-testimonial-delete.php?id=<?php echo $testimonial["id"]?>">
															<i class="fa fa-trash-alt"></i>
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
		$('.clickable').click(function(){
			var testimonialID = $(this).attr("data-id");
			window.location.href = "../action/update-testimonial-status-action.php?id="+testimonialID;
		})

		// For Multipul Delete
		$('#checkAll').click(function(){
			$('input:checkbox').not(this).prop('checked', this.checked);
		})
		var $submit = $("#submit_prog").hide(),
        $cbs = $('input[class="prog"]').click(function() {
            $submit.toggle( $cbs.is(":checked") );
        });

        var $submitundo = $("#submit_prog2").hide(),
        $cbsundo = $('input[class="prog"]').click(function() {
            $submitundo.toggle( $cbsundo.is(":checked") );
        });


	})
</script>