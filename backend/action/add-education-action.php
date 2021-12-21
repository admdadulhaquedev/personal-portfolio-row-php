<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// code...
		$education_year = $_POST['education_year'];
		$education_title = $_POST['education_title'];
		$education_progress = $_POST['education_progress'];
		$education_status = $_POST['education_status'];

		// Form Validation
		if (empty($education_year)) {
			$_SESSION['education_year'] = "Please Enter Value's";
			header("location:../add/add-education.php");
		} 
		elseif(empty($education_title)) {
			header("location:../add/add-education.php");
			// $_SESSION['empty'] = "Please Enter Value";
		} 
		elseif(empty($education_progress)) {
			header("location:../add/add-education.php");
			// $_SESSION['empty'] = "Please Enter Value";
		}
		else{
			// Data Insert Query
			if ($education_status == "active") {

				$insert = "INSERT INTO education(year, title, progress_bar, status) VALUES('$education_year','$education_title','$education_progress','1')";
				$iq = mysqli_query($db, $insert);
				if ($iq) {
					header("location:../view-data/education.php");
				}
				else{
					echo "Active Query Failed";
				}

			}
			elseif ($education_status == "inactive") {

				$insert = "INSERT INTO education(year, title, progress_bar, status) VALUES('$education_year','$education_title','$education_progress','2')";
				$iq = mysqli_query($db, $insert);

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