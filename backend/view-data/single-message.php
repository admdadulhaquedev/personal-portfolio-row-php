<?php 
	include_once '../inc/header.php';

	$id = $_GET['id'];

    $message_select = "SELECT * FROM messages WHERE id = $id";
    $message_sq = mysqli_query($db, $message_select);
    $massoc = mysqli_fetch_assoc($message_sq);

?>


	<!--  Show Single Message -->
	<!-- Page Wrapper -->
	<div class="page-wrapper">
		<div class="content container-fluid">
			<!-- Page Header -->
			<div class="page-header">
				<div class="row">
					<div class="col-sm-12">
						<h3 class="page-title">Single Messages</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="../deshbord/deshbord.php">Dashboard</a>
							</li>
							<li class="breadcrumb-item active">Single Messages</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /Page Header -->

			<div class="row">
				<div class="col-lg-12">
					<p class="main_warp">
					    <table style="width:680px" cellSpacing=0 cellpadding=0 border=0>
					      	<tbody>
					      		<!-- parsonal info -->
						        <tr>
						          	<td class="parsonal_detilas" vAlign=top>
						      		  	<strong >
						              			Parsonal Detilas
						              	</strong>   

						        		<table style="width: 255px" cellSpacing=0 cellpadding=0 border=0>
						    				<tbody>
						    					<!-- name -->
						            			<tr>
						                			<td class="label" vAlign=top>
						                				Name:
						                			</td>
						                			<td class="input_value" vAlign=top>
						                  				<strong><?php echo $massoc["name"] ?></strong>
						                			</td>
						            			</tr>
						            			<!-- name -->
								            	<!-- email -->
								            	<tr>
								                	<td class="label" vAlign=top>
								                		Email:
								                	</td>
								                	<td class="input_value" vAlign=top>
								                  		<a class="link" href="mailto:<?php echo $massoc["email"] ?>">
								                    		<strong><?php echo $massoc["email"] ?></strong>
								                		</a>
								      		  		</td>
								          		</tr>
								          		<!-- email -->
							        		</tbody>
						        		</table>
						    		</td>
						        </tr>
						        <!-- parsonal info -->
					      	</tbody>
					    </table>
					</p>
					<p>
						<h3>Message</h3>
						<?php echo $massoc["message"] ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	<!-- /Page Wrapper -->

	<!--  Show Single Message -->
    		
<?php

	include_once '../inc/footer.php';
 ?>