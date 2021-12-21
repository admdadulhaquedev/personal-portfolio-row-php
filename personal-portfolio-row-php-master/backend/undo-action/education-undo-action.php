<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	$education_id = $_GET['id'];

	$education_status_update = "UPDATE education SET status = 1 WHERE id = '$education_id'";
	$ssuq = mysqli_query($db, $education_status_update);

	if ($ssuq) {
		header("location:../trash/education-trash.php");
	}
	else{
		header("location:../error/error-404.php");
	}
	
?>