<?php 
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'kufa');
	
	$db = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

	// define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// define('RESOURCES', SELF . 'resources/');
 ?>