<html>
<head>
</head>
<body>

<?php
	$db = new mysqli('localhost','root','','food_order');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_name('user_login');
		session_start();

		$sql = "SELECT image, item_id, name, price, description FROM items";
		$result = $db->query($sql);
		
		if ($result->num_rows >= 0) {
			while($row = $result->fetch_assoc()) {
?>
				<div style='background-color: #f9f9f9; margin: 20px; font-family: Niramit;border: solid;border-radius: 25px;overflow:auto;'>
				<div style='font-size: 24px;margin-top: 20px;margin-left: 20px;'>
				<?php $row["name"] ?>
<?php
			}
		}
	}
?>
</body>
</html>