<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$name = $_POST["name"];
		$email = $_POST["email"];
		$message = mysqli_real_escape_string($db, $_POST["message"]);
		
		// Multiple recipients
		$to = 'karnoderkni17085@gmail.com, designerkarnoder@gmail.com'; // note the comma

		// Subject
		$subject = "Verify Message";

		$messagebody = '
		<!DOCTYPE HTML PUBLIC "-//W3C//Dtd html 4.0 transitional//EN">
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=unicode" http-equiv=Content-Type>
	  			<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0," />
				<title>Message</title>
				<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
				<style type="text/css">
					.main_warp{
						font-size: 10px; 
						margin-bottom: 5px; 
						font-family: Arial; 
						margin-top: 0pt;
					}
					.parsonal_detilas{
						font-size: 25pt; 
						font-family: "Dancing Script"; 
						width: 400px; 
					}
					.label{
						font-size: 9pt;
						font-family: Arial; 
						width: 80px; 
						color: #000000;
						text-transform: capitalize;
						font-weight: 700;
					}
					.input_value{
						font-size: 9pt; 
						font-family: Arial; 
						width: 175px; 
						color: #000000;
					}
					.link{
						font-size: 9pt; 
						text-decoration: none; 
						color: #000000;
					}
				</style>
			</head>
				<body>
				  <p class="main_warp">
				    <table style="width:680px" cellSpacing=0 cellpadding=0 border=0>
				      	<tbody>
				      		<!-- parsonal info -->
					        <tr>
					          	<td class="parsonal_detilas" vAlign=top>
					      		  	<strong >
					              			Parsonal Detilas
					              	</strong>   

					        		<table style="width: 255px" cellSpacing=0 cellpadding=0 border=0>
					    				<tbody>
					    					<!-- name -->
					            			<tr>
					                			<td class="label" vAlign=top>
					                				Name:
					                			</td>
					                			<td class="input_value" vAlign=top>
					                  				<strong>'.$name.'</strong>
					                			</td>
					            			</tr>
					            			<!-- name -->
							            	<!-- email -->
							            	<tr>
							                	<td class="label" vAlign=top>
							                		Email:
							                	</td>
							                	<td class="input_value" vAlign=top>
							                  		<a class="link" href="mailto:'.$email.'">
							                    		<strong>'.$email.'</strong>
							                		</a>
							      		  		</td>
							          		</tr>
							          		<!-- email -->
						        		</tbody>
					        		</table>
					    		</td>
					        </tr>
					        <!-- parsonal info -->
				      	</tbody>
				    </table>
				</p>
				<p>
					<h3>Message</h3>
					'.$message.'
				</p>
			</body>
		</html>

		';

		// To send HTML mail, the Content-type header must be set
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';

		// Additional headers
		$headers[] = 'To: Melon Mia <designerkarnoder@gmail.com>, Karnoder <karnoderkni17085@gmail.com>';
		$headers[] = 'From: Amdadul Haque Melon '.$email.'';
		// $headers[] = 'Cc: birthdayarchive@example.com';
		// $headers[] = 'Bcc: birthdaycheck@example.com';

		// Mail it
		$mail = mail($to, $subject, $messagebody, implode("\r\n", $headers));

		if ($mail) {
			$insert = "INSERT INTO messages(name, email, message) VALUES('$name','$email','$message')";
			$iq = mysqli_query($db, $insert);
			if ($iq) {
				header("location:../../index.php#contact");
			}
		}
		else {
			echo "Failed";
		}
		
	}
	else{
		header("location:../error/error-404.php");
	}

 ?>