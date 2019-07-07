<?php
$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
	session_start();
//what session name have you given here for admin? insert if exists
	$item_id = $_POST['item'];
	$deleteitem = "DELETE FROM ITEMS WHERE ITEM_ID = $item_id;"; //this part you'll have to correct cause it doesn't work
	$result = $db->query($deleteitem);
	if($result===true) {
		header('Location: adminmenu.php');
		//add alert here if you want, dont know the syntax for that
	}
	else {
		echo "delete not successful";
	}
}

?>

