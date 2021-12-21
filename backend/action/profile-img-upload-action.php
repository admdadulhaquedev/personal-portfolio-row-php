<?php 
	// session_start();
	require_once "../inc/session.php";
	require_once "../inc/database.php";
	$user_id = $_SESSION["user_id"];

	$select = "SELECT * FROM users WHERE id = '$user_id'";
	$sq = mysqli_query($db, $select);
	$assoc = mysqli_fetch_assoc($sq);

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$image = $_FILES["photo"]["name"];
		$explode = explode(".", $image);
		$ext = end($explode);


		$allow_format = ["png","PNG","JPEG","jpeg","svg","SVG","jpg","JPG"];
		
		if (in_array($ext, $allow_format)) {

			if ($_FILES["photo"]["size"] < 2000000) {
				$img_name = strtolower(str_replace(" ", "-", $assoc["name"]));
				$img_full_name = $img_name."-".$user_id.".".$ext;

				if (file_exists("../upload/".$assoc["photo"])) {
					unlink("../upload/".$assoc["photo"]);
				}

				$new_location = "../upload/".$img_full_name;

				move_uploaded_file($_FILES["photo"]["tmp_name"], $new_location);

				$update_img = "UPDATE users SET photo = '$img_full_name' WHERE id = $user_id";
				$uq = mysqli_query($db, $update_img);

				if($uq){
					header("location:../authentication/profile.php");
				}
				else{
					echo "failed";
				}
			}
			else{
				header("location:../authentication/profile.php");
			}
		} 
		else {
			header("location:../authentication/profile.php");
		}
		
	} 
	else {
		header("location:../authentication/profile.php");
	}
	
 ?>