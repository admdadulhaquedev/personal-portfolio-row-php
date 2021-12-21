<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	$select = "SELECT * FROM patners ORDER BY id DESC LIMIT 1";
	$sq = mysqli_query($db, $select);
	$assoc = mysqli_fetch_assoc($sq);

	$last_id = $assoc["id"];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$patner_img = $_FILES["photo"]['name'];

		$explod =explode(".", $patner_img);
		$ext = end($explod);

		$allow_format =["png","PNG","jpg","JPG","jpeg","JPEG","svg","SVG"];

		if (in_array($ext,$allow_format)) {
			if ($_FILES["photo"]['size'] < 400000) {

				$patner_img_name = "patner"."-".++$last_id.".".$ext;
				$new_location = "../upload/patners_img/".$patner_img_name;

				if (file_exists("upload/".$assoc["image"])) {
					unlink("upload/".$assoc["image"]);
				}
				
				move_uploaded_file($_FILES["photo"]["tmp_name"], $new_location);

				$insert_image = "INSERT INTO patners(image) VALUES('$patner_img_name')";
				$insert_image_q = mysqli_query($db,$insert_image);
				if ($insert_image_q) {
					header("location:../add/add-patner.php");
				} 
				else {
					header("location:../error/error-404.php");
				}
				
			} 
			else {
				header("location:../add/add-patner.php");
			}
			
		}
	}
	else {
		header("location:../error/error-404.php");
	}

 ?>