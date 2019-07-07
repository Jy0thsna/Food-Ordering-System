<?php

	$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		echo "Connect worked.";
		
		if($_POST['password'] == $_POST['confirm_password']) {
			$name = $_POST['name'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];
			$email = $_POST['email'];
			$address_1 = $_POST['address_1'];
			$address_2 = $_POST['address_2'];
			$address_3 = $_POST['address_3'];
			
			$sql = "INSERT INTO users(name, username, password, email, address_1, address_2, address_3)"."VALUES('$name', '$username', '$password', '$email', '$address_1', '$address_2', '$address_3')";
		
			if ($db->query($sql)===true) {
				echo "<script>
				alert('Login to view contents.');
				window.location.href='login.html';
				</script>";
				}
		} else {
		echo "Password not matched.";
		}

	}
?>