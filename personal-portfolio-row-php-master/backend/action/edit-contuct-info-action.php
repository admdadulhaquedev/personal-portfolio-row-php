<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$id = $_POST["id"];
		$description = $db->real_escape_string($_POST['description']);
		$address = $db->real_escape_string($_POST['address']);

		if (empty($address)) {
			header("location:../edit/edit-contuct-info.php");
		}
		elseif (empty($description)) {
		 	header("location:../edit/edit-contuct-info.php");
		}
		else{
		 	$contuct_update = "UPDATE contact_information SET contuct_desc = '$description', address = '$address' WHERE id = '$id'";
		 	$contuct_q = mysqli_query($db, $contuct_update);

		 	if ($contuct_q) {
		 		header("Location:../view-data/contuct-info.php");
		 	}
		 	else{
		 		header("location:../error/querry-error-404.php");
		 	}
		}
		
	} 
	else {
		header("location:../error/error-404.php");
	}
	