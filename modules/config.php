<?php
	switch ($_SERVER['REQUEST_URI']) {
		case "/signin":
			$CURRENT_PAGE = "Sign-in"; 
			break;
		default:
			$CURRENT_PAGE = "Home";
	}
	
    $servername = "";
	$username = "";
	$dbpassword = "";
    $dbname = '';
?>