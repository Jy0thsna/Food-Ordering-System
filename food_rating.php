<?php	

echo "<html>
		<head>
			<title>Food Lover: Your Profile</title>
			<link rel='stylesheet' href='style.css'>
			<link rel='shortcut icon' href='main_logo.jpg' />
			<link href='https://fonts.googleapis.com/css?family=Niramit' rel='stylesheet'>
		</head>
		
		<body>
		<h2 style='font-family: Niramit; color: black; font-size: 60px; text-align: center;'><b>FOOD AVERAGE RATINGS</b></h2>";
$db = new mysqli('localhost','root','','food_system');

	if($db->connect_error) {
		die('connection failed');
		}
	else {
		session_name('user_login');
		session_start();
		$user = $_SESSION['user'];
		
		echo "<center><a href='adminhome.php'><button  
								style='font-family:sans-serif;
								color: #FFFFFF;
								background: #4CAF50;
								outline: 0;
								width: 200px;
								border: 0;padding:
								15px;font-size: 14px'><< BACK</button></a></center><br>";
								
		$get_rating = "SELECT R.item_id, AVG(R.rate)
						FROM rating R
						GROUP BY R.item_id";
		$result = $db->query($get_rating);
		
			echo"<br><br>";
				echo "<center><table style='font-family: Niramit;
							border-collapse: collapse;
							width: 800px;;'>";
				echo "<tr style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>ITEM_ID</b></th>";
				echo "<th style='border: 1px solid #dddddd;
							text-align: left;
							padding: 8px;'><b>AVERAGE RATING</b></th>";
				echo "</tr>";
				
			while($row = $result->fetch_assoc()) {
			echo "<tr>";	
			echo "<th>"	. $row['item_id'] . "</th>";
			echo "<th>"	. round($row['AVG(R.rate)'],1) . "</th>";
			echo "</tr>";
			}
		echo "</table></center>";
		echo "<br><br><br><br>";
		}
	echo "</body>
	</html>";
?>