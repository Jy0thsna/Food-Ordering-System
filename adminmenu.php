<html>
<head>
	<title>Food Lover: Admin Menu</title>
	<link rel="shortcut icon" href="main_logo.jpg" />
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css?family=Niramit" rel="stylesheet">
</head>
<body>

	<ul class="navbar">
		<li class="company"><img src="logo.jpg" style="width:47px;"></li>
		<li class="company" style="padding-left:20px;font-family:Niramit"><b> Food Lover </b></li>
		<li class="list_items"><a href="logout.php">Logout</a></li>
		<li class="list_items"><a href="adminhome.php">Home</a></li>
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
		
		if ($result->num_rows > 0) {

			while($row = $result->fetch_assoc()) {
				$img = $row["image"];
				$id = $row["item_id"];
				echo "<div style='display: inline-block;
					background-color: #f9f9f9;
					margin: 20px;
					font-family: Niramit;
					border: solid;
					overflow:auto;'>";
				echo "<div style='text-align:center;
					font-size: 30px;
					margin-top: 5px;
					margin-left: 20px;'>"
					. "<b>" . $row["name"] . "</b>" . "</div>" . "<br>" . 
					 "<img src = $img width=300px height=300px style='margin-left: 10px;margin-right:10px;'>" .    
					 "<div style='font-size: 24px;
					 text-align:center; '>"
					 . "Price: " . $row["price"] . "</div>" . 
					 "<div style='font-size:20px;text-align:center;'>"
					 . $row["description"]
					 . "</div>"; 
				
				echo "<form action='deleteitem.php' method='POST'>";
				
				echo "<button name='item' value=$id 
					style='font-family:sans-serif;
					color: #FFFFFF;
					background: #ff3e3e;
					outline: 0;
					width: 100%;
					border: 0;padding:
					15px;font-size: 14px'>DELETE ITEM</button>";
				echo "</form>";
				echo "</div>";
				
			}
				echo "<center><form action='newitem.php' method='POST'>";
					echo "<button name='item' 
						style='font-family:sans-serif;
						color: #FFFFFF;
						background: #4CAF50;
						outline: 0;
						width: 200px;
						border: 0;padding:
						15px;font-size: 14px'>ADD ITEM</button>";
				echo "</form><center>";
		}
	}
?>





