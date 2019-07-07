<?php
	$db = new mysqli('localhost','root','','food_system');

		if($db->connect_error) {
			die('connection failed');
		}
		else {
			session_name('user_login');
			session_start();
			
			$user = $_SESSION['user'];
			$payment_method = $_POST['payment'];
			
			$get_user_id = "SELECT customer_id FROM users WHERE username='$user'";
			$result1 = $db->query($get_user_id);
			$row1 = $result1->fetch_assoc();
			$user_id = $row1['customer_id'];
			$date = date('Y-m-d H:i:s');
			
			$get_total_amt = "SELECT SUM(O.total) 
								FROM orders O
								WHERE order_id IS NULL
								AND customer_id='$user_id'";
			$result2 = $db->query($get_total_amt);
			$row2 = $result2->fetch_assoc();
			$total_amt = $row2['SUM(O.total)'];
			
			$get_balance = "SELECT wallet_balance FROM wallet WHERE customer_id='$user_id'";
			$result5 = $db->query($get_balance);
			$row5 = $result5->fetch_assoc();
			$wallet_balance = $row5['wallet_balance'];
			
			$create_order = "INSERT INTO order_details(customer_id, date, payment_type, total, status) 
			VALUES('$user_id', '$date', '$payment_method', '$total_amt', 'NOT DELIVERED')";
			
			
			if($payment_method == "wallet" ) {
				
				if($total_amt <= $wallet_balance) {
					$result3 = $db->query($create_order);
					$update_balance = "UPDATE wallet 
										SET wallet_balance = wallet_balance - '$total_amt' 
										WHERE customer_id = '$user_id'";
					$result4 = $db->query($update_balance);
					
					if($result3 === TRUE) {
						if($result4 === TRUE) {
							echo "<script>alert('Order confirmed and wallet balance updated.');
							window.location.href='menu.php';
							</script>";
						}
						else {
							echo "<script>alert('BALANCE UPDATE NOT PERFORMED.');
							window.location.href='confirm.php';
							</script>";
						}
				}
					else {
						echo "<script>alert('Order not inserted into order_details.');
						window.location.href='confirm.php';
						</script>";
					}
				}
				else {
					echo "<script>alert('Not enough wallet balance. Change payment method.');
					window.location.href='confirm.php';
					</script>";
					}
			}
			else {
				$result3 = $db->query($create_order);
				if($result3 === TRUE && $payment_method == "cod"){
				echo "<script>alert('Order confirmed.');
				window.location.href='menu.php';
				</script>";
				}
			}
		
		}
?>