<?php

$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_name('user_login');
		session_start();
		
		$user = $_SESSION['user'];
		
		$get_user_details = "SELECT name,email,address_1,address_2,address_3 FROM users WHERE username='$user'";
		$result = $db->query($get_user_details);
		$row = $result->fetch_assoc();
		
		$name = htmlspecialchars($row['name']);
		$email = htmlspecialchars($row['email']);
		$address_1 = htmlspecialchars($row['address_1']);
		$address_2 = htmlspecialchars($row['address_2']);
		$address_3 = htmlspecialchars($row['address_3']);
		
		echo "<html>
		<head>
			<title>Food Lover: Login</title>
			<link rel='stylesheet' href='style.css'>
			<link rel='shortcut icon' href='main_logo.jpg' />
			<link href='https://fonts.googleapis.com/css?family=Niramit' rel='stylesheet'>
		</head>
		<body>

			<h2 style='font-family: Niramit; color: black; font-size: 60px; text-align: center;'><b>EDIT PROFILE</b></h2>
			<center><div style='width: 600px;font-family:Niramit;border:solid;margin:auto;font-size:24px;padding:100px 100px;line-height:3;border-radius:25px;'>
			<form method='POST' action='edit.php'>
					<input class='edit_items' type='text' name='name' value='$name' ><br>
					<input class='edit_items' type='email' name='email' value='$email' ><br>
					<input class='edit_items' type='text' name='address_1' value='$address_1' ><br>
					<input class='edit_items' type='text' name='address_2' value='$address_2' ><br>
					<input class='edit_items' type='text' name='address_3' value='$address_3' ><br><br>
					<button type='submit' 
						style='font-family:sans-serif;
						color: #FFFFFF;
						background: #4CAF50;
						outline: 0;
						width: 200px;
						border: 0;
						padding: 15px;
						font-size: 14px'>SAVE</button>
			</form>
			</div></center>
		</body>
		</html>";
	}
?>