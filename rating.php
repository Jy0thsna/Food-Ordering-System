<?php

	$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_name('user_login');
		session_start();
		
		$user = $_SESSION['user'];

echo "<html>
<head>
	<title>Food Lover: Home</title>
	<link rel='stylesheet' href='style.css'>
	<link rel='shortcut icon' href='main_logo.jpg' />
	<link href='https://fonts.googleapis.com/css?family=Niramit' rel='stylesheet'>
</title>
</head>

<body class='home_style'>
	<ul class='navbar'>
		<li class='company'><img src='logo.jpg' style='width:47px;'></li>
		<li class='company' style='padding-left:20px;font-family:Niramit'><b> Food Lover </b></li>
		<li class='list_items'><a href='menu.php'>Menu</a></li>
		<li class='dropdown list_items' >
			<a href='javascript:void(0)' class='dropbtn' >Your Profile</a>
			<div class='dropdown-content'>
				<a href='your_profile.php'>Your Profile</a>
				<a href='your_wallet.php'>Your Wallet</a>
				<a href='rating.php'>Rate Food</a>
				<a href='logout.php'>Logout</a>
			</div>
		</li>
		<li class='list_items'><a href='home.php'>Home</a></li>
	</ul>
	
	<div class='description'>
		<h2 class='home_head' style='margin-right: 150px;'>Rate Food</h2><br>
	</div>
	<br><br><br><br><br><br><br><br><br><br><br>
	<p style='align:right'>
	<div style='float:right;width: 600px;font-family:Niramit;border:solid;font-size:24px;padding:50px 50px;border-radius:25px;'>";
			
	echo "<center><div style='font-size: 30px;font-family=Niramit;font-weight:bold;'>- - - Food Rating - - -<br></div></center><br>";
			
			$get_user_id = "SELECT customer_id
						FROM users
						WHERE username='$user'";
			$result1 = $db->query($get_user_id);
			$row1 = $result1->fetch_assoc();
			$id = $row1['customer_id'];
		
			$ratefood = "SELECT DISTINCT I.item_id, I.name
							FROM items I, orders O, users U, order_details OD, rating R
							WHERE O.customer_id='$id'
							AND I.item_id=O.item_id
							AND OD.order_id=O.order_id
							AND OD.status='DELIVERED'
							AND NOT EXISTS(SELECT R1.item_id
											FROM rating R1
											WHERE R1.customer_id='$id'
											AND I.item_id = R1.item_id)";
			
			$result = $db->query($ratefood);
			while ($row = $result->fetch_assoc()) {
			$id = $row['item_id'];
			echo "<form action = 'updaterating.php' method = 'POST'>
				<center>" . $row['name']. ": <select style='font-family: Niramit;
						outline: 1;
						background: #f2f2f2;
						width: 100px;
						border: 0;
						margin: 0 0 15px;
						padding: 15px;
						box-sizing: border-box;
						font-size: 14px;' name='rating'>
					<option value='1'>1</option>
					<option value='2'>2</option>
					<option value='3'>3</option>
					<option value='4'>4</option>
					<option value='5'>5</option>
					</select><br>
					<button type='submit' 
						name='item_id' value=$id
						style='font-family:sans-serif;
						color: #FFFFFF;
						background: #4CAF50;
						outline: 0;
						width: 200px;
						border: 0;
						padding: 15px;
						font-size: 14px'>UPDATE RATING</button><br></center>
				</form>";
			}
			echo "</div></p>";
echo "</body>

</html>";
	}
?>