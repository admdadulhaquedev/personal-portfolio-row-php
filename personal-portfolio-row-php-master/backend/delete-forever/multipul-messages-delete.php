<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$id = $_POST["mess_id"];

		if (isset($_POST['delete'])){

			foreach ($id as $key => $delete_id) {

				$delete = "DELETE FROM messages WHERE id = '$delete_id'";
				$dq = mysqli_query($db, $delete);

				if ($dq) {
					header("location:../trash/messages-trash.php");
				}
				else {
					header("location:../error/error-404.php");
				}
				
			}

		}
		elseif(isset($_POST['undo-action'])){

			foreach ($id as $key => $undo_id) {

				$message_status_update = "UPDATE messages SET status = 1 WHERE id = '$undo_id'";
				$msuq = mysqli_query($db, $message_status_update);

				if ($msuq) {
					header("location:../trash/messages-trash.php");
				}
				else{
					header("location:../error/error-404.php");
				}

			}
		}

	} 
	else {
		header("location:../error/error-404.php");
	}
	
?>
