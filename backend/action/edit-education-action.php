<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// code...
		$id = $_POST["id"];
		$education_year = $_POST['education_year'];
		$education_title = $_POST['education_title'];
		$education_progress = $_POST['education_progress'];
		$education_status = $_POST['education_status'];

		// Form Validation
		if (empty($education_year)) {
			$_SESSION['education_year'] = "Please Enter Value's";
			header("location:../edit/edit-education.php");
		} 
		elseif(empty($education_title)) {
			header("location:../edit/edit-education.php");
			// $_SESSION['empty'] = "Please Enter Value";
		} 
		elseif(empty($education_progress)) {
			header("location:../edit/edit-education.php");
			// $_SESSION['empty'] = "Please Enter Value";
		}
		else{
			// Data Insert Query
			if ($education_status == "active") {

				$update = "UPDATE education SET year ='$education_year', title = '$education_title', progress_bar = '$education_progress', status = 1 WHERE id = '$id' ";
				$iq = mysqli_query($db, $update);
				if ($iq) {
					header("location:../view-data/education.php");
				}
				else{
					echo "Active Query Failed";
				}

			}
			elseif ($education_status == "inactive") {

				$update = "UPDATE education SET year ='$education_year', title = '$education_title', progress_bar = '$education_progress', status = 2 WHERE id = '$id' ";
				$iq = mysqli_query($db, $update);

				if ($iq) {
					header("location:../view-data/education.php");
				}
				else{
					echo "Inactive Query Failed";
				}

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