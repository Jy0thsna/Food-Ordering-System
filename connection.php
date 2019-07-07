<?php
	$db_server = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_database = "food";
    $db = mysqli_connect($db_server,$db_username,$db_password,$db_database);
	
	if($db)
		echo "Connected";
?>