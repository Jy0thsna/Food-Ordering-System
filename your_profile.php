<html>
<head>
	<title>Food Lover: Your Profile</title>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="main_logo.jpg" />
	<link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
</head>
<body>

	<ul class="navbar">
		<li class="company"><img src="logo.jpg" style="width:47px;"></li>
		<li class="company" style="padding-left:20px;font-family:Niramit"><b> Food Lover </b></li>
		<li class="list_items"><a href="menu.php">Menu</a></li>
		<li class="dropdown list_items" >
			<a href="javascript:void(0)" class="dropbtn" >Your Profile</a>
			<div class="dropdown-content">
				<a href="your_profile.php">Your Profile</a>
				<a href="your_wallet.php">Your Wallet</a>
				<a href="rating.php">Rate Food</a>
				<a href="logout.php">Logout</a>
			</div>
		</li>
		<li class="list_items"><a href="home.php">Home</a></li>
	</ul>
	<br><br>
	<h2 style="font-family: Niramit; color: black; font-size: 60px; text-align: center;"><b>YOUR PROFILE</b></h2>
	
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
		
		$get_user = "SELECT customer_id,name,username,email,address_1,address_2,address_3 FROM users WHERE username = '$user'";
		$result = $db->query($get_user);
		$row = $result->fetch_assoc();
		$customer_id = $row['customer_id'];
		echo "<div style='width: 800px;font-family:Niramit;border:solid;margin:auto;font-size:24px;padding:100px 100px;line-height:3;border-radius:25px;'>";
			echo "<b>	NAME: </b>" . $row['name'] . "<br>";
			echo "<b>	USERNAME: </b>" . $row['username'] . "<br>";
			echo "<b>	EMAIL: </b>" . $row['email'] . "<br>";
			echo "<b>	ADDRESS 1: </b>" . $row['address_1'] . "<br>";
			echo "<b>	ADDRESS 2: </b>" . $row['address_2'] . "<br>";
			echo "<b>	ADDRESS 3: </b>" . $row['address_3'] . "<br>";
		echo "</div>";
		
		echo "<br><br>";
		echo "<form method='POST' action='edit_profile.php'>";
		echo "<center><button style='font-family:sans-serif;
			color: #FFFFFF;
			background: #4CAF50;
			outline: 0;
			width: 200px;
			border: 0;
			padding: 15px;
			font-size: 14px'>EDIT</button>
			</center></form>";
			
		echo "<br><br>";
		
		echo "<h2 style='font-family:Niramit; color:black; font-size:40px; text-align:center;'><b>ORDER HISTORY</b></h2>";
		
		$order_history = "SELECT I.name, I.price,O.quantity, OD.status, O.date 
							FROM items I, orders O,order_details OD 
							WHERE O.item_id = I.item_id
							AND O.order_id = OD.order_id
							AND O.customer_id = '$customer_id'
							AND OD.customer_id = '$customer_id'
							ORDER BY O.date";
		
		$result2 = $db->query($order_history);
		
		if($result2->num_rows>=0) {
			echo"<br><br>";
				echo "<table style='font-family: Niramit;
							border-collapse: collapse;
							width: 100%;'>";
				echo "<tr style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>DATE</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>ITEM NAME</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>PRICE</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>QUANTITY</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>STATUS</b></th>";			
				echo "</tr>";
				
		while($row2 = $result2->fetch_assoc()) {
			echo "<tr>";	
			echo "<th>"	. $row2['date'] . "</th>";
			echo "<th>"	. $row2['name'] . "</th>";
			echo "<th>"	. $row2['price'] . "</th>";
			echo "<th>"	. $row2['quantity'] . "</th>";
			echo "<th>"	. $row2['status'] . "</th>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<br><br><br><br>";
	}
	}
?>