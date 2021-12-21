<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$profile_img = $_FILES['photo']["name"];
		$name = $_POST["name"];
		$rank = $_POST['rank'];
		$comment = $_POST["comment"];
		$comment_status =$_POST['comment_status'];


		if (empty($profile_img)) {
			header("location:../add/add-trstimonial.php");
		}
		elseif (empty($name)) {
			header("location:../add/add-trstimonial.php");
		}
		elseif (empty($comment)) {
			header("location:../add/add-trstimonial.php");
		}
		elseif ($comment_status == "active") {
			$comment_insert = "INSERT INTO testimonials(comment, name, rank, status) VALUES('$comment','$name','$rank','1')";
			$comment_insert_q = mysqli_query($db, $comment_insert);

			if ($comment_insert_q) {

				$select = "SELECT * FROM testimonials ORDER BY id DESC LIMIT 1";
				$select_q = mysqli_query($db,$select);
				$assoc = mysqli_fetch_assoc($select_q);
				$last_id = $assoc['id'];

				$explod = explode(".", $profile_img);
				$ext = end($explod);
				$allow_format = ["png","PNG","jpg","JPG","jpeg","JPEG"];
				
				if (in_array($ext, $allow_format) && $_FILES['photo']["size"] < 4000000) {

					$image_name = strtolower(str_replace(" ", "-", $name)).".".$ext;
					$new_location = "../upload/testimonials_img/".$image_name;
					move_uploaded_file($_FILES['photo']["tmp_name"], $new_location);
					$update_img = "UPDATE testimonials SET proflie_img = '$image_name' WHERE id = '$last_id' ";
					$update_img_q = mysqli_query($db, $update_img);

					
					if ($update_img_q) {
						header("location:../view-data/testimonials.php");
					} 
					else {
						header("location:../error/querry-error-404.php");
					}
				}
				else {
					header("location:../add/add-trstimonial.php");
				}
				

			}
			else {
				header("location:../error/querry-error-404.php");
			}
			
		}
		else {
			$comment_insert = "INSERT INTO testimonials(comment,name,rank,status) VALUES('$comment','$name','$name','2')";
			$comment_insert_q = mysqli_query($db, $comment_insert);

			if ($comment_insert_q) {

				$select = "SELECT * FROM testimonials ORDER BY id DESC LIMIT 1";
				$select_q = mysqli_query($db,$select);
				$assoc = mysqli_fetch_assoc($select_q);
				$last_id = $assoc['id'];

				$explod = explode(".", $profile_img);
				$ext = end($explod);

				$image_name = strtolower(str_replace(" ", "-", $name)).".".$ext;

				// echo $image_name;

				$new_location = "../upload/testimonials_img/".$image_name;
				move_uploaded_file($_FILES['photo']["tmp_name"], $new_location);

				$update_img = "UPDATE testimonials SET proflie_img = '$image_name' WHERE id = '$last_id' ";
				$update_img_q = mysqli_query($db, $update_img);

				if ($update_img_q) {
					header("location:../view-data/testimonials.php");
				} 
				else {
					header("location:../error/querry-error-404.php");
				}
			} 
			else {
				header("location:../error/querry-error-404.php");
			}
			
		}
		
	} 
	else {
		header("location:../error/error-404.php");
	}
	

 ?>