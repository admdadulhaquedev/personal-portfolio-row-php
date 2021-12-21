<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	$delete_id = $_GET['id'];

	$message_delete = "DELETE FROM messages WHERE id = '$delete_id'";
	$dq = mysqli_query($db, $message_delete);

	if ($dq) {
		header("location:../trash/messages-trash.php");
	}
	else{
		header("location:../error/error-404.php");
	}
	
?>