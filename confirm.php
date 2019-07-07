<html>
	<head>
		<title>Food Lover: Your Cart</title>
			<link rel='stylesheet' href='style.css'>
			<link rel='shortcut icon' href='main_logo.jpg' />
			<link href='https://fonts.googleapis.com/css?family=Niramit' rel='stylesheet'>
	</head>
	<body>
		<h2 style='font-family: Niramit; color: black; font-size: 60px; text-align: center;'><b>ORDER CONFIRMATION</b></h2><br>
								
		<center><a href='orders.php'><button  
			style='font-family:sans-serif;
			color: #FFFFFF;
			background: #4CAF50;
			outline: 0;
			width: 200px;
			border: 0;padding:
			15px;font-size: 14px'><< BACK</button></a></center>
			
		<center><div style='font-family:Niramit;
				border:solid;
				margin:auto;
				font-size:24px;
				padding:100px 100px;
				text-align:left;
				width: 600px;
				margin: 20px;
				font-family: Niramit;
				border-radius: 25px;
				overflow:auto;'>
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
			$user_id = $row1['customer_id'];
			
		$user = $_SESSION['user'];
		$get_user = "SELECT name,username,email,address_1,address_2,address_3 FROM users WHERE username = '$user'";
		$result = $db->query($get_user);
		$row = $result->fetch_assoc();
		
		$get_total_amt = "SELECT SUM(O.total) 
								FROM orders O
								WHERE order_id IS NULL
								AND customer_id='$user_id'";
			$result2 = $db->query($get_total_amt);
			$row2 = $result2->fetch_assoc();
			$total_amt = $row2['SUM(O.total)'];
			
		echo "<b>	NAME: </b>" . $row['name'] . "<br>";
		echo "<b>	USERNAME: </b>" . $row['username'] . "<br>";
		echo "<b>	EMAIL: </b>" . $row['email'] . "<br>";
		echo "<b>	ADDRESS 1: </b>" . $row['address_1'] . "<br>";
		echo "<b>	ADDRESS 2: </b>" . $row['address_2'] . "<br>";
		echo "<b>	ADDRESS 3: </b>" . $row['address_3'] . "<br>";
		echo "<b>   TOTAL AMOUNT: </b>" . $total_amt . "<br>";
		}
		?>
		
		<form action='confirm_order.php' method='POST'>
		<b>Payment Method: </b>
			<select style='font-family: Niramit;
				outline: 1;
				background: #f2f2f2;
				width: 300px;
				border: 0;
				margin: 0 0 15px;
				padding: 15px;
				box-sizing: border-box;
				font-size: 14px;' name='payment'>
			<option value='wallet'>Wallet</option>
			<option value='cod'>Cash on Delivery</option>
			</select>
			<br><br>
			<center>
			<button style='font-family:sans-serif;
			color: #FFFFFF;
			background: #4CAF50;
			outline: 0;
			width: 200px;
			border: 0;
			padding: 15px;
			font-size: 14px'>CHECKOUT</button>
			</a></center>
	
		</form>
		</div>
		
	</body>
</html>