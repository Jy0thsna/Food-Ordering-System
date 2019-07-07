<html>
<head>
	<title>Food Lover: Your Wallet</title>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="main_logo.jpg" />
	<link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
</head>
<body>

	<ul class="navbar">
		<li class="company"><img src="logo.jpg" style="width:47px;"></li>
		<li class="company" style="padding-left:20px;font-family:Niramit"><b> Food Lover </b></li>
		<li class="list_items"><a href="menu.html">Menu</a></li>
		<li class="dropdown list_items" >
			<a href="javascript:void(0)" class="dropbtn" >Your Profile</a>
			<div class="dropdown-content">
				<a href="your_profile.php">Your Profile</a>
				<a href="your_wallet.php">Your Wallet</a>
				<a href="rating.php">Rate Food</a>
				<a href="logout.php">Logout</a>
			</div>
		</li>
		<li class="list_items"><a href="home.html">Home</a></li>
	</ul>
	<br><br>
	<h2 style="font-family: Niramit; color: black; font-size: 60px; text-align: center;"><b>YOUR WALLET</b></h2>
	
</body>
<html>

<?php
	$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_name('user_login');
		session_start();
		
		$user = $_SESSION['user'];
		
		$get_user_id = "SELECT customer_id FROM users WHERE username='$user'";
		$result1 = $db->query($get_user_id);
		$row1 = $result1->fetch_assoc();
		$id = $row1['customer_id'];
		
		$get_balance = "SELECT wallet_balance FROM wallet WHERE customer_id='$id'";
		$result2 = $db->query($get_balance);
		$row2 = $result2->fetch_assoc();
		$balance = $row2['wallet_balance'];
		
		echo "<center><div style='background-color: #f9f9f9;
				width: 600px;
				margin: 20px;
				font-family: Niramit;
				border: solid;
				overflow:auto;border-radius:5px;'>";
				
		echo "<br><br><div style='font-size: 25px;font-family=Niramit;'>Total Balance <br></div>"; 
		
		echo "<br><br>";
		echo "<div style='font-size: 80px; font-family=Niramit;' >Rs. $balance</div><br><br>";
				
		echo "</div></center>";
	}
?>