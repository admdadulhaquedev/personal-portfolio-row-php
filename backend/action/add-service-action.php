<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// code...
		$title = $_POST['title'];
		$icon = $_POST['icon'];
		$description = $_POST['description'];
		$service_status = $_POST['active_service'];

		// Form Validation
		if (empty($title)) {
			$_SESSION['title'] = "Please Enter Valid Name";
			header("location:../add/add-service.php");
		} 
		elseif(empty($icon)) {
			// header("location:../add/add-service.php");
			// // $_SESSION['empty'] = "Please Enter Value";
		} 
		elseif(empty($description)) {
			// header("location:../add/add-service.php");
			// // $_SESSION['empty'] = "Please Enter Value";
		}
		else{
			// Data Insert Query
			if ($service_status == "active") {

				$insert = "INSERT INTO services(title, description, icon, status) VALUES('$title','$description','$icon','1')";
				$iq = mysqli_query($db, $insert);
				if ($iq) {
					header("location:../view-data/services.php");
				}
				else{
					echo "Active Query Failed";
				}

			}
			elseif ($service_status == "inactive") {

				$insert = "INSERT INTO services(title, description, icon, status) VALUES('$title','$description','$icon','2')";
				$iq = mysqli_query($db, $insert);

				if ($iq) {
					header("location:../view-data/services.php");
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
