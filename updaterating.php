<?php
	$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_name('user_login');
		session_start();
		
		$user = $_SESSION['user'];
		
		$rate = $_POST['rating'];
		$item_id = $_POST['item_id'];
		
		$get_user_id = "SELECT customer_id
						FROM users
						WHERE username='$user'";
		$result = $db->query($get_user_id);
		$row = $result->fetch_assoc();
		$id = $row['customer_id'];
		
		
		$insertrating = "INSERT INTO rating(customer_id,item_id,rate)"."VALUES('$id', '$item_id','$rate')";
		$result3 = $db->query($insertrating);
			
		if($result3 === true)
			header('Location: rating.php');
	}
?>