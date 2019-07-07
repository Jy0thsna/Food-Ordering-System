<?php
	session_name('user_login');
    session_start(); 
?>


<html>
<head>
	<title>Food Lover: Home</title>
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="main_logo.jpg" />
	<link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
</title>
</head>

<body class="home_style">
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
	
	<div class="description">
		<h2 class="home_head">Food Lover</h2><br>
		<p class="home_para">
		Ordering food has never been easier. With a few clicks, you can have your favourite meal delivered to your doorstep. 
		</p>
		<p class="home_para">
		We have a wide variety of dishes to choose from, which stretch across multiple cuisines and are even available at 
		attractive rates. 
		</p>
		<p class="home_para">
		Avail exclusive cash back offers and benefits through this site. 
		Order your favourite dish now!
		</p>
	</div>
</body>

</html>