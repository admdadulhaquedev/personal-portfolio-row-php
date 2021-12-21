<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// code...
		$id = $_POST['count_id'];
		$icon = $_POST['icon'];
		$count_number = $_POST['count_number'];
		$title = $_POST['title'];

		// Form Validation
		if (empty($icon)) {
			$_SESSION['icon'] = "Please Enter Value's";
			header("location:../edit/edit-counter-item.php");
		} 
		elseif(empty($count_number)) {
			header("location:../edit/edit-counter-item.php");
			$_SESSION['count_number'] = "Please Enter Value";
		} 
		elseif(empty($title)) {
			header("location:../edit/edit-counter-item.php");
			$_SESSION['title'] = "Please Enter Value";
		}
		else{
			// Data Update Query

			$update = "UPDATE counter SET icon ='$icon', count_number = '$count_number', title = '$title' WHERE id = '$id' ";
			$uq = mysqli_query($db, $update);

			if ($uq) {
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