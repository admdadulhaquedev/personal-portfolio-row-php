<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		foreach ($_POST['mess_id'] as $key => $delete_it) {

			$message_status_update = "UPDATE messages SET status = 2 WHERE id = '$delete_it'";
			$msuq = mysqli_query($db, $message_status_update);

			if ($msuq) {
				header("location:../view-data/messages.php");
			}
			else{
				echo "Delete Query Failed";
			}

		}

	} 
	else {
		header("location:../view-data/messages.php");
	}
	
	
?>