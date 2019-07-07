<?php
	$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
	session_start();
	$ORDER_ID = $_POST['ord_id'];
	$sql ="UPDATE ORDER_DETAILS SET STATUS='DELIVERED' WHERE ORDER_ID='$ORDER_ID'";
	$result = $db->query($sql);
	if($result ===true){
	echo "<script>alert('Order delivered.');
				window.location.href='view_orders.php';
				</script>";
	}
	}
?>