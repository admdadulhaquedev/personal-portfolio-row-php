<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	$delete_id = $_GET['id'];

	$message_status_update = "UPDATE messages SET status = 1 WHERE id = '$delete_id'";
	$msuq = mysqli_query($db, $message_status_update);

	if ($msuq) {
		header("location:../trash/messages-trash.php");
	}
	else{
		header("location:../error/error-404.php");
	}
	
?>
