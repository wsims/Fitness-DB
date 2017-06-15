<?php include("_header.php");?>
<link rel="stylesheet" href="assets/style.css">
<html>
<head>
	<title>Fitness Database</title>
</head>

<div id="contentWrapper">
	<?php
	// change the value of $dbuser and $dbpass to your username and password
		include 'connectvarsEECS.php';

		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		$table = 'Routine';
		$query = "SELECT routineID, name, length FROM $table";

		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
		while($obj = $result -> fetch_object()){
			$thisNid = htmlspecialchars($obj -> routineID);
			$thisName = htmlspecialchars($obj -> name);
			$thisLength = htmlspecialchars($obj -> length);
			echo "<div id='content'>";
			echo "<a href='http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/routineView.php?id=".$thisNid."' style='text-decoration:none'>";
			echo "<h2 id='title'>".$thisName."</h2>";
			echo "</a>";
			echo "<h2 id='length'>".$thisLength."</h2>";	
			echo "</div>";
		}
		
		session_start();
		if(!isset($_SESSION['UserLogined']))
		{
			 session_unset();
			 session_destroy();
		}
		
		mysqli_free_result($result);
		mysqli_close($conn);
	?>
</div>
</html>
