<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// code...
		$icon = $_POST['icon'];
		$count_number = $_POST['count_number'];
		$title = $_POST['title'];

		// Form Validation
		if (empty($icon)) {
			$_SESSION['icon'] = "Please Enter Value's";
			header("location:../add/add-counter-item.php");
		} 
		elseif(empty($count_number)) {
			header("location:../add/add-counter-item.php");
			// $_SESSION['empty'] = "Please Enter Value";
		} 
		elseif(empty($title)) {
			header("location:../add/add-counter-item.php");
			// $_SESSION['empty'] = "Please Enter Value";
		}
		else{
			// Data Insert Query
			$insert = "INSERT INTO counter(icon, count_number, title) VALUES('$icon','$count_number','$title')";
			$iq = mysqli_query($db, $insert);

			if ($iq) {
				header("location:../view-data/counter.php");
			}
			else{
				echo "Query Failed";
			}
		}

	} 
	else {
		header("location:../error/error-404.php");

	}
	
 ?>