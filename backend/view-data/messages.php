
<?php 
	include_once '../inc/header.php';

    $message_select = "SELECT * FROM messages WHERE status = 1 ORDER BY id DESC";
    $message_sq = mysqli_query($db, $message_select);
 
 ?>

<!-- Page Wrapper -->
<div class="page-wrapper">
	<div class="content container-fluid">

		<!-- Page Header -->
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Messages</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="../deshbord/deshbord.php">Dashboard</a>
						</li>
						<li class="breadcrumb-item active">Messages</li>
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
							<h4 class="card-title">Messages List's</h4>
							<button class="btn btn-primary" id="submit_prog" type="submit" name="delete">Delete Seletected</button>
						</div>

						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-nowrap mb-0">
										<?php 

										    if (mysqli_fetch_assoc($message_sq) > 0) {
										    	
										?>
									<thead>
										<tr>
											<th>LS</th>
											<th class="checkbox text-center">
												<input class="prog" id="checkAll" type="checkbox" name="mess_id[]">
											</th>
											<th>Name</th>
											<th>Email</th>
											<th>Message</th>
											<th>Time</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody>
		                            	<?php foreach ($message_sq as $key => $message): ?>
										<tr class="<?php if($message["seen_status"] == "1"){echo "unseen";} ?>">

											<td><?php echo $key + 1 ?></td>
											<td class="checkbox text-center">
												<input class="prog" type="checkbox" name="mess_id[]" value="<?php echo $message["id"] ?>">
											</td>
											<td data-id="<?php echo $message["id"] ?>" class="clickable"><?php echo $message["name"] ?></td>
											<td data-id="<?php echo $message["id"] ?>" class="clickable"><?php echo $message["email"] ?></td>
											<td data-id="<?php echo $message["id"] ?>" class="clickable message_text"><?php echo $message["message"] ?></td>
											<td data-id="<?php echo $message["id"] ?>" class="clickable"><?php echo $message["send_time"] ?></td>
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
		$('.clickable').click(function(){
			var messageID = $(this).attr("data-id");
			window.location.href = "../action/update-message-status-action.php?id="+messageID;
		})

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