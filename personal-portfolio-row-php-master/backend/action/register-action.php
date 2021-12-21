<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	if ($_SERVER['REQUEST_METHOD'] == "POST" ) {
		$name = $_POST['name'];
		$email = $_POST["email"];
		$phone = $_POST["phone"];
		$password = $_POST["password"];
		$confirmpassword = $_POST["confirmpassword"];

		//Keep Value
		$_SESSION["namevalue"] = $name;
		$_SESSION["emailvalue"] = $email;
		$_SESSION["phonevalue"] = $phone;
		$_SESSION["passwordvalue"] = $password;
		$_SESSION["cpasswordvalue"] = $confirmpassword;

		//Password Validation
		$number = !preg_match(" /[0-9]/ ", $password);
		$spacialCharacters = !preg_match(" /[\'^�$%&*()}{@#~?><>,|=_+�-]/ ", $password);
		$lowecase = !preg_match(" /[a-z]/ ", $password);
		$upercase = !preg_match("@[A-Z]@", $password);

		//Email Validation
	 	$scount = "SELECT COUNT(*) as total FROM users WHERE email = '$email'";
	 	$scq= mysqli_query($db, $scount);
	 	$assoc = mysqli_fetch_assoc($scq);


		if (empty($name) || preg_match("@[0-9]@", $name)) {
			$_SESSION['namealert'] = "Please Enter Valid Name";
			header("location:../register.php");
		}
		elseif (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$_SESSION["emailalert"] = "Please enter valid Email";
			header("Location:../register.php");
		}
		elseif ($assoc["total"] > 0) {
			$_SESSION["emailalert"] = "This Email Already Used";
			header("Location:../register.php");
		}
		elseif (empty($phone) || preg_match(" /[\'^�$%&*()}{@#~?><>,|=_�-]/ ", $phone)) {
			$_SESSION["phonealert"] = "please enter valid phone";
			header("Location:../register.php");
		}
		elseif (empty($password) || strlen($password) < 7 || $number || $spacialCharacters || $lowecase || $upercase) {
			$_SESSION["passwordalert"] = "Please choose Strong Password";
			header("Location:../register.php");
		}
		elseif ($confirmpassword !=$password) {
			$_SESSION["confirmpasswordalert"] = "Password Not Match";  
			header("Location:../register.php");
		}
		else{
			$hash = password_hash($password, PASSWORD_DEFAULT);
			$insert = "INSERT INTO users (name, phone, email, password) VALUES ('$name', '$phone', '$email', '$hash')";
			if (mysqli_query($db, $insert)) {
				header("location:../index.php");
			} 
			else {
				echo "Register Failed";
			}
		}
	}
	else {
		header("location:../register.php");
	}

 ?>