<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$name = $db->real_escape_string($_POST['name']);
		$link =  $db->real_escape_string($_POST['link']);
		$icon_class = $db->real_escape_string($_POST['icon_class']);
		$item_status = $_POST['item_status'];

		if (empty($name)) {
			header("location:../add/add-social-icon.php");
		}
		elseif (empty($link)) {
		 	header("location:../add/add-social-icon.php");
		}
		elseif (empty($icon_class)) {
		 	header("location:../add/add-social-icon.php");
		}
		else{
		 	$social_insert = "INSERT INTO social_links(name, link, icon, status) VALUES('$name','$link','$icon_class','$item_status')";
		 	$social_q = mysqli_query($db, $social_insert);

		 	if ($social_q) {
		 		header("Location:../view-data/social-info.php");
		 	}
		 	else{
		 		header("location:../error/querry-error-404.php");
		 	}
		}
		
	} 
	else {
		header("location:../error/error-404.php");
	}
	