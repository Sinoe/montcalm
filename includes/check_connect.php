<?php 
    
	$is_connected = false;

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    	$is_connected = false;
        header("location: login.php");
        exit;
    } else {
		$is_connected = true;
    }

    global $is_connected;
    $GLOBALS['is_connected'];
 ?>