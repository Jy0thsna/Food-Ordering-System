<?php
	
	$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_name('user_login');
		session_start();
			
		$qty = $_POST['qty'];
		$item_id = $_POST['item'];
		
		$user = $_SESSION['user'];
		$get_cust_id = "SELECT customer_id FROM users WHERE username = '$user'";
		$get_price = "SELECT price FROM items WHERE item_id = '$item_id'";
		
		$result1 = $db->query($get_cust_id);
		$result2 = $db->query($get_price);
		
		$row1 = $result1->fetch_assoc();
		$user_id = $row1['customer_id'];
		
		$row2 = $result2->fetch_assoc();
		$price = $row2['price'];
		
		$total = $price * $qty;
		$date = date('Y-m-d H:i:s');
			
		$insert_into_order = "INSERT INTO orders(customer_id, item_id, quantity, price, total, date)".
		"VALUES('$user_id', '$item_id', '$qty', '$price', '$total', '$date')";
		
		$result3=$db->query($insert_into_order);
					
		if($result3 === TRUE) {
			echo "<script>
			alert('Item added to cart.');
			window.location.href='menu.php';
			</script>";
		}
	}
?>