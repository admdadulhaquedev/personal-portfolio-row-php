<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		$website_name = $_POST['website_name'];

		//Logo Or Images 
		$logo_white = $_FILES['logo_white']["name"];
		$logo_black = $_FILES['logo_black']["name"];

		$favicon = $_FILES['favicon']["name"];

		// for logo
		$explod_logo_white = explode("." , $logo_white);
		$explod_logo_black = explode("." , $logo_black);

		$ext_logo_white = end($explod_logo_white);
		$ext_logo_black = end($explod_logo_black);

		// Logo Name
		$logo_white_name = "logo-white".".".$ext_logo_white;
		$logo_black_name = "logo-black".".".$ext_logo_black;

		$allow_format_logo = ["png","PNG","jpg","JPG","jpeg","JPEG","svg","SVG"];

		// Logo File Location
		$white_location = "../upload/logo/".$logo_white_name;
		$black_location = "../upload/logo/".$logo_black_name;


		// for favicon
		$explode_favicon = explode(".", $favicon);
		$ext_favicon = end($explode_favicon);
		$allow_format_favicon = ["png","PNG","favicon"];
		$favicon_name = "favicon".".".$ext_favicon;
		$favicon_location = "../upload/favicon/".$favicon_name;

		if (!in_array($ext_logo_white, $allow_format_logo) && $_FILES["logo_white"]["size"] > 10000000) {
			// $_SESSION['white_logo'] = "11";
			header("location:../setting/settings.php");

		}
		elseif (!in_array($ext_logo_black, $allow_format_logo) && $_FILES["logo_black"]["size"] > 10000000) {
			
			header("location:../setting/settings.php");

		}
		elseif(!in_array($ext_favicon, $allow_format_favicon) && $_FILES["favicon"]["size"] > 100000){

			header("location:../setting/settings.php");

		}
		else{

			move_uploaded_file($_FILES['logo_white']["tmp_name"], $white_location);
			move_uploaded_file($_FILES['logo_black']["tmp_name"], $black_location);
			move_uploaded_file($_FILES['favicon']["tmp_name"], $favicon_location);

			$insert_settings = "INSERT INTO settings(website_name, logo_white, logo_black, favicon) VALUES('$website_name','$logo_white_name','$logo_black_name','$favicon_name')";
			$insert_q = mysqli_query($db, $insert_settings);

			if ($insert_q) {
				header("location:../deshbord/deshbord.php");
			}
			else {
				header("location:../error/querry-error-404.php");
			}
			

		}
			
	}
	else{
		header("location:../error/error-404.php");
	}
?>