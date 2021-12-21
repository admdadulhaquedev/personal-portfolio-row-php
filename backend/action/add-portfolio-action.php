<?php 

	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$title = $_POST['title'];
		$slug = $_POST['slug'];

		$description = $db->real_escape_string($_POST['description']);
		$category = $_POST['category'];
		$portfolio_status = $_POST['portfolio_status'];

		//For Images 
		$thumbnail_img = $_FILES['thumbnail']["name"];
		$feature_image = $_FILES['feature_image']["name"];

		$explod_thumbnail = explode(".", $thumbnail_img);
		$ext_thumbnail = end($explod_thumbnail);

		$explod_feature = explode(".", $feature_image);
		$ext_feature = end($explod_feature);

		$allow_format =["png","PNG","jpg","JPG","jpeg","JPEG","svg","SVG"];

		// Insert Query
		$insert_portfolio = "INSERT INTO portfolios(title, slug, description, category_id, status) VALUES('$title','$slug', '$description','$category','$portfolio_status')";
		$insert_portfolio_q = mysqli_query($db, $insert_portfolio);
		$id = mysqli_insert_id($db);

		if ($insert_portfolio_q) {
			$image_name = strtolower(str_replace(" ", "-", $title));

			// For Thumbnail
			$thumbnail_img_name = $image_name."-"."thumbnail-img"."-".$id.".".$ext_thumbnail;
			$thumbnail_img_location = "../upload/portfolio-img/thumbnail/".$thumbnail_img_name;
			move_uploaded_file($_FILES['thumbnail']["tmp_name"],$thumbnail_img_location);

			// For Feature Image
			$feature_img_name = $image_name."-"."feature-img"."-".$id.".".$ext_feature; 
			$feature_img_location = "../upload/portfolio-img/feature/".$feature_img_name;
			move_uploaded_file($_FILES['feature_image']["tmp_name"], $feature_img_location);

			// Update Query
			$image_update = "UPDATE portfolios SET thumbnail = '$thumbnail_img_name', feature_image = '$feature_img_name' WHERE id = '$id'";
			$image_update_q = mysqli_query($db, $image_update);

			if ($image_update_q) {
				header("location:../view-data/portfolios.php");
			}
			else {
				header("location:../error/querry-error-404.php");
			}
			
		}
		else {
			header("location:../error/querry-error-404.php");
		}
	
	} 
	else {
		header("location:../error/error-404.php");
	}
	
 ?>