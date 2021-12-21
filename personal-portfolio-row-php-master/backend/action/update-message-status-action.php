<?php 
	include_once '../inc/database.php';
	include_once '../inc/session.php';

	$id = $_GET['id'];

    $message_select = "SELECT * FROM messages WHERE id = $id";
    $message_sq = mysqli_query($db, $message_select);
    $massoc = mysqli_fetch_assoc($message_sq);

    if ($massoc["seen_status"] == 1) {

    	$message_update = "UPDATE messages SET seen_status = '2' WHERE id = $id";
    	$message_uq = mysqli_query($db, $message_update);

    	if ($message_uq) {
    		header("location:../view-data/single-message.php?id=".$massoc["id"]);
    	}
    	else {
    		echo "You Can't See This Message";
    	}
    	
    }
    else {
    	header("location:../view-data/single-message.php?id=".$massoc["id"]);
    }
 ?>