<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST["name"];
		$categorie_status = $_POST["categorie_status"];

		$insert_category = "INSERT INTO categories(name, status) VALUES('$name','$categorie_status')";
		$insert_category_q = mysqli_query($db, $insert_category);
		
		if ($insert_category_q) {
			header("location:../view-data/categories.php");
			
		} 
		else {
			header("location:../error/querry-error-404.php");
		}
		
	} 
	else {
		header("location:../error/error-404.php");
	}
	
?>