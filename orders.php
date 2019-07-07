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
		<title>Food Lover: Your Cart</title>
			<link rel='stylesheet' href='style.css'>
			<link rel='shortcut icon' href='main_logo.jpg' />
			<link href='https://fonts.googleapis.com/css?family=Niramit' rel='stylesheet'>
		</head>
		<body>
			<h2 style='font-family: Niramit; color: black; font-size: 60px; text-align: center;'><b>- - - CART - - -</b></h2>";
			
			echo "<form action='confirm.php' method='POST'>";
			echo "<center><button style='font-family:sans-serif;
				color: #FFFFFF;
				background: #4CAF50;
				outline: 0;
				width: 200px;
				border: 0;
				padding: 15px;
				font-size: 14px'>CONFIRM ORDER</button></center>";
			echo "</form>";
			echo "<br>";
			
			echo "<form action='cancel.php' method='POST'>";
			echo "<center><button style='font-family:sans-serif;
				color: #FFFFFF;
				background: #4CAF50;
				outline: 0;
				width: 200px;
				border: 0;
				padding: 15px;
				font-size: 14px'>CANCEL ORDER</button></center>";
				echo "</form>";
			echo "<br>";
			
			$get_orders = "SELECT I.name, O.item_id, O.quantity, O.price, O.total, I.image, O.date
							FROM items I, orders O
							WHERE I.item_id = O.item_id
							AND O.order_id IS NULL";
							
			$result = $db->query($get_orders);
			
				if ($result->num_rows >= 0) {
					while($row = $result->fetch_assoc()) {
						$name = $row['name'];
						$quantity = $row['quantity'];
						$price = $row['price'];
						$total = $row['total'];
						$image = $row['image'];
						$id = $row['item_id'];
						$date = $row['date'];
						
							echo "<center><div style='background-color: #f9f9f9;
								width: 600px;
								margin: 20px;
								font-family: Niramit;
								border: solid;
								overflow:auto;border-radius:5px;'>";
							echo "<div style='font-size: 30px;'>
								 <b>" . $name . "</b>" . "</div>" . "<br>" .     
								 "<div style='font-size: 24px;'>"
								 . "Price: " . $price . "<br>" 
								 . "Quantity: " . $quantity . "<br>"
								 . "Total: " . $total
								 . "</div>"; 
					
							echo "</div></center>";
						}
					}
		
		echo "<center><a href='menu.php'><button  
								style='font-family:sans-serif;
								color: #FFFFFF;
								background: #4CAF50;
								outline: 0;
								width: 200px;
								border: 0;padding:
								15px;font-size: 14px'><< BACK</button></a></center>";
		
		echo "</body>";
		echo "</html>";
		}
?>