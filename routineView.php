<?php include("_header.php"); ?>
<link rel="stylesheet" href="assets/style.css">
<html>
<head>
	<title>Fitness DB</title>
</head>

<div id="contentWrapper">
	<?php
	// change the value of $dbuser and $dbpass to your username and password
		include 'connectvarsEECS.php';
		$id = $_GET["id"];

		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		$query = "SELECT Routine.name, Exercise.name FROM Routine
JOIN routineExercise ON Routine.routineID = routineExercise.routineID JOIN Exercise ON routineExercise.exerciseID = Exercise.exerciseID";

		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}

		echo "</tr>\n";
		while($row = mysqli_fetch_row($result)) {

		if($previousRow != $row[0])
		{
		echo "<div id='content'>";
		echo "<h2 id='title'>".$row[0]."</h2>";
		echo "--------------------------";
		echo "<br><br>";
		echo "</div>";
		}
		$previousRow = $row[0];
		echo "<div id='content'>";
		echo "<h2 id='title'>".$row[1]."</h2>";
		echo "<br><br>";
		echo "</div>";
		}
		
		mysqli_free_result($result);
		mysqli_close($conn);
	?>
</div>

</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       