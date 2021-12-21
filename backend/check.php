<?php 
	include_once 'inc/database.php';

    // $message_select = "SELECT * FROM messages WHERE status = 1 ORDER BY id DESC";
    // $message_sq = mysqli_query($db, $message_select);


    // if (mysqli_fetch_assoc($message_sq) > 0) {
    	
    // 	foreach ($message_sq as $key => $value) {
    // 		echo "melon";
    // 	}
    // }
    // else {
    // 	echo "Data Out";
    // }
    





    echo "<pre>";
    print_r($_SERVER);
    echo "</pre>";

    echo $_SERVER['PHP_SELF'];
 ?>