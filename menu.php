<html>
<head>
	<title>Food Lover: Menu</title>
	<link rel="shortcut icon" href="main_logo.jpg" />
	<link rel="stylesheet" href="style.css">
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
	<h2 style="font-family: Niramit; color: black; font-size: 60px; text-align: center;"><b>- - - MENU - - -</b></h2>
</body>
</html>

<?php	
$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_name('user_login');
		session_start();

		$sql = "SELECT image, item_id, name, price, description FROM items";
		$result = $db->query($sql);
	
		echo "<center>
			<a href = 'orders.php'>
			<button style='font-family:sans-serif;
			color: #FFFFFF;
			background: #4CAF50;
			outline: 0;
			width: 200px;
			border: 0;
			padding: 15px;
			font-size: 14px'>CHECKOUT</button>
			</a></center>";
		echo "<br>";
		
		if ($result->num_rows >= 0) {

			while($row = $result->fetch_assoc()) {
				$img = $row["image"];
				$id = $row["item_id"];
				$name = $row["name"];
				
				$rating = "SELECT AVG(rate) AS avg_rate
					FROM rating 
					WHERE item_id = '$id'";
				$result2 = $db->query($rating);
				$row2 = $result2->fetch_assoc();
				echo "<div style='display: inline-block;
					background-color: #f9f9f9;
					margin: 20px;
					font-family: Niramit;
					border: solid;
					overflow:auto;border-radius:5px;'>";
					
				echo "<div style='text-align:center;
					font-size: 30px;
					margin-top: 5px;
					margin-left: 20px;'>"
					. "<b>" . $row["name"] . "</b>" . "</div>" . "<br>" . 
					 "<img src = $img alt = $name width=300px height=300px style='margin-left: 10px;margin-right:10px;'>" .    
					 "<div style='font-size: 24px;
					 text-align:center; '>
					 Price: " . $row["price"] .   
					 "<br><div style='font-size: 20px'>Average Rating: " . round($row2['avg_rate'],1) . "/5" .  
					 "<br>Description: " . $row["description"] . "</div></div>";
				
				echo "<form action='menu1.php' method='POST'>";
				echo "<center>Quantity: " . "<input style='width:50px' type='number' name='qty' min='1' value='1'/></center><br>";
				
				echo "<button name='item' value=$id 
					style='font-family:sans-serif;
					color: #FFFFFF;
					background: #4CAF50;
					outline: 0;
					width: 100%;
					border: 0;padding:
					15px;font-size: 14px'>ADD ITEM</button>";
				echo "</form>";
				echo "</div>";
			}
		}
	}
?>




