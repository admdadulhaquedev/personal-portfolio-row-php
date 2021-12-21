<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	$service_id = $_GET['id'];

	$service_status_update = "UPDATE services SET status = 1 WHERE id = '$service_id'";
	$ssuq = mysqli_query($db, $service_status_update);

	if ($ssuq) {
		header("location:../trash/services-trash.php");
	}
	else{
		header("location:../error/error-404.php");
	}
	
?>