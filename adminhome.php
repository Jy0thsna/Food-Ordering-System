<?php
session_start();
?>

<html>
<head>
	<title>Food Lover: Admin Home</title>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="main_logo.jpg" />
	<link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
</title>
</head>

<body class="home_style">
	<ul class="navbar">
		<li class="company"><img src="logo.jpg" style="width:47px;"></li>
		<li class="company" style="padding-left:20px;font-family:Niramit"><b>Food Lover</b></li>
		<li class="list_items"><a href="logout.php">Logout</a></li>
		<li class="list_items"><a href="adminhome.php">Home</a></li>
	</ul>
	
	<div class="description">
		<h2 class="home_head">Admin Page</h2><br>
			<form action="view_orders.php" method="POST">
			<p align="right">
			<button style='font-family:sans-serif;
				color: #FFFFFF;
				background: #4CAF50;
				outline: 0;
				width: 200px;
				border: 0;
				padding: 15px;
				font-size: 14px'>VIEW ORDERS</button>
			</form>
			</p>
			
			<form action="view_users.php" method="POST">
			<p align="right">
			<button style='font-family:sans-serif;
				color: #FFFFFF;
				background: #4CAF50;
				outline: 0;
				width: 200px;
				border: 0;
				padding: 15px;
				font-size: 14px'>VIEW USERS</button>
			</form>
			</p>
		
			<form action="adminmenu.php" method="POST">
			<p align="right">
			<button style='font-family:sans-serif;
				color: #FFFFFF;
				background: #4CAF50;
				outline: 0;
				width: 200px;
				border: 0;
				padding: 15px;
				font-size: 14px'>UPDATE MENU</button></center>
			</form>
			</p>
			
			<form action="food_rating.php" method="POST">
			<p align="right">
			<button style='font-family:sans-serif;
				color: #FFFFFF;
				background: #4CAF50;
				outline: 0;
				width: 200px;
				border: 0;
				padding: 15px;
				font-size: 14px'>FOOD RATINGS</button></center>
			</form>
			</p>
			
		</p>
	</div>
</body>
</html>