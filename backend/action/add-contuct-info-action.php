<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$address = $db->real_escape_string($_POST['address']);
		$description = $db->real_escape_string($_POST['description']);

		if (empty($description)) {
			header("location:../add/add-contuct-info.php");
		}
		elseif (empty($address)) {
		 	header("location:../add/add-contuct-info.php");
		}
		else{
		 	// $contuct_insert = "INSERT INTO contact_information( address, phone, email, contuct_desc) VALUES('$address','$phone','$email','$description')";
		 	$contuct_insert = "INSERT INTO `contact_information`(`address`,`contuct_desc`) VALUES ('$address','$description')";
			 $contuct_q = mysqli_query($db, $contuct_insert);

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
	