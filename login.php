<?php

	$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		echo "Connect worked.";

		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		
		$result = $db->query($sql);

		if($result-> num_rows> 0) {
			session_name('user_login');
			session_start();
			$_SESSION['user'] = $username;
			
			if($username == 'admin')
				echo "<script>
				alert('Logged in as admin.');
				window.location.href='adminhome.php';
				</script>";
			
			else
				header('Location: home.php');
		}
		else {
			echo "<script>
			alert('Username and Password do not match or Register before login.');
			window.location.href='login.html';
			</script>";
		}
	}
?> 

