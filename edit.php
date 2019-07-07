<?php

$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_name('user_login');
		session_start();
		
		$user = $_SESSION['user'];
		
		$name = $_POST['name'];
		$email = $_POST['email'];
		$address_1 = $_POST['address_1'];
		$address_2 = $_POST['address_2'];
		$address_3 = $_POST['address_3'];
		
		$update_profile = "UPDATE users SET name='$name', email='$email', address_1='$address_1', address_2='$address_2', address_3='$address_3' WHERE username='$user'";
		$result = $db->query($update_profile);
		
		if($result === TRUE) {
			echo "<script>alert('Profile updated.');
				window.location.href='your_profile.php';
				</script>";
		}
	}
?>