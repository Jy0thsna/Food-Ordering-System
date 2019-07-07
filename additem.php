<?php 
$db = new mysqli('localhost','root','','food_system');
if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_start();
		$item_name = $_POST['item_name'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$image_link = $_POST['image_link'];

		$additem = "INSERT INTO ITEMS(NAME,PRICE,DESCRIPTION,IMAGE)"."VALUES('$item_name','$price','$description','$image_link');";
		$result = $db->query($additem);
		if($result === true) {
			header('Location: adminmenu.php');
		}

	}
?>