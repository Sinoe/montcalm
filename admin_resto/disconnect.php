<?php 
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
		unset($_SESSION['ADM_CONNECTED']);
    	unset($_SESSION['ADM_LOGIN']);
    	unset($_SESSION['ADM_ROLE']);
		session_destroy();
		header("Location: index.php");
 ?>