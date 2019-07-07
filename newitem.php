<?php 
echo "<html>
<head>
	<title>Food Lover: Add Item</title>
	<link rel='shortcut icon' href='main_logo.jpg' />
	<link rel='stylesheet' href='style.css'>
	<link href='https://fonts.googleapis.com/css?family=Niramit' rel='stylesheet'>
</head>
<body>

	<ul class='navbar'>
		<li class='company'><img src='logo.jpg' style='width:47px;'></li>
		<li class='company' style='padding-left:20px;font-family:Niramit'><b> Food Lover </b></li>
		<li class='list_items'><a href='adminmenu.php'>Menu</a></li>
		<li class='list_items'><a href='adminhome.php'>Home</a></li>
		<li class='list_items'><a href='logout.php'>Logout</a></li>
	</ul>
	<br><br>
	<h2 style='font-family: Niramit; color: black; font-size: 60px; text-align: center;'><b>ADD ITEM</b></h2>
</body>
</html>";

$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_start();

		echo "<center><div style='width: 600px;font-family:Niramit;border:solid;margin:auto;font-size:24px;padding:100px 100px;line-height:3;border-radius:25px;'>
			<form method='POST' action='additem.php'>
					<input class='edit_items' type='text' name='item_name' placeholder='Name' ><br>
					<input class='edit_items' type='text' name='price' placeholder='Price' ><br>
					<input class='edit_items' type='text' name='description' placeholder='Description' ><br>
					<input class='edit_items' type='text' name='image_link' placeholder='Image URL' ><br><br>
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
			</div></center>";
	}
?>