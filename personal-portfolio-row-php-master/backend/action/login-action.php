<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$email = $_POST["email"];
		$password = $_POST["password"];

		$select = "SELECT COUNT(*) as total, id, name, phone, email, password FROM users WHERE email = '$email';";
		$sq = mysqli_query($db, $select);
		$assoc = mysqli_fetch_assoc($sq);

		//Keep Value
		$_SESSION["emailvalue"] = $email;
		$_SESSION["passwordvalue"] = $password;

		$hash = $assoc["password"];

		if ($assoc["total"] > 0) {
			if (password_verify($password, $hash)) {
				$_SESSION["user_id"] = $assoc["id"];
				$_SESSION["user_email"] = $assoc["email"];
				$_SESSION["user_password"] = $assoc["password"];
				header("location:../blank/blank-page.php");
			}
			else{
				$_SESSION["passwordalert"] = "Password Not Match";
				header("location:../index.php");
			}
		}
		elseif(!$assoc["total"] > 0 && !password_verify($password, $hash)){
			$_SESSION['emailalert'] = "Email Not Match";
			$_SESSION["passwordalert"] = "Password Not Match";
			header("location:../index.php");
		}
		else {
			$_SESSION['emailalert'] = "Email Not Match";
			header("Location:../index.php");
		}
		
	} 
	else {
		header("location:../index.php");
	}
	
 ?>