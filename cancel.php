<?php
	$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_name('user_login');
		session_start();
		
		$user = $_SESSION['user'];
		
		$delete_order = "DELETE FROM orders WHERE order_id IS NULL";
		$result = $db->query($delete_order);
		
		if($result === TRUE) {
			echo "<script>
			alert('Order cancelled.');
			window.location.href='menu.php';
			</script>";
		}
	}
?>