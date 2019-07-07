<?php
$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
	}
	else {
		session_name('user_login');
		session_start();

		echo "<html>
		<head>
		<title>Food Lover: User Details</title>
		<link rel='shortcut icon' href='main_logo.jpg' />
		<link rel='stylesheet' href='style.css'>
		<link href='https://fonts.googleapis.com/css?family=Niramit' rel='stylesheet'>
		</head>
		
		<body>
		<h2 style='font-family: Niramit; color: black; font-size: 60px; text-align: center;'><b>USER DETAILS</b></h2>";
		
		echo "<center><a href='adminhome.php'><button  
								style='font-family:sans-serif;
								color: #FFFFFF;
								background: #4CAF50;
								outline: 0;
								width: 200px;
								border: 0;padding:
								15px;font-size: 14px'><< BACK</button></a></center><br>";
		
		$view_users = "CALL ADMIN_USER_VIEW()";
		$result = $db->query($view_users);
		if($result->num_rows>=0) {
				echo"<br><br>";
				echo "<table style='font-family: Niramit;
							border-collapse: collapse;
							width: 100%;'>";
				echo "<tr style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>CUSTOMER_ID</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>NAME</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>USERNAME</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>EMAIL</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>ADDRESS_1</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>ADDRESS_2</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>ADDRESS_3</b></th>";
				echo "</tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>";	
			echo "<th>"	. $row['CUSTOMER_ID'] . "</th>";
			echo "<th>"	. $row['NAME'] . "</th>";
			echo "<th>"	. $row['USERNAME'] . "</th>";
			echo "<th>"	. $row['EMAIL'] . "</th>";
			echo "<th>"	. $row['ADDRESS_1'] . "</th>";
			echo "<th>"	. $row['ADDRESS_2'] . "</th>";
			echo "<th>"	. $row['ADDRESS_3'] . "</th>";
			echo "</tr>";
		}
		echo "</table>";
	}	
		echo "</body>
			</html>";
	}

?>