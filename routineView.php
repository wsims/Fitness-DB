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
		$query = "SELECT name FROM Routine WHERE routineID = $id";
		$result = mysqli_query($conn, $query);
		$obj = $result -> fetch_object();
		$routineName = htmlspecialchars($obj -> name);
		echo "<h1>".$routineName."</h1>";

		$query = "SELECT Exercise.name, defaultSets, defaultReps
FROM Exercise, routineExercise, Routine
WHERE Exercise.exerciseID = routineExercise.exerciseID 
AND Routine.routineID = routineExercise.routineID
AND Routine.routineID = $id";

		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
		while($obj = $result -> fetch_object()){ 
			$thisExercise = htmlspecialchars($obj -> name);
			$thisSets = htmlspecialchars($obj -> defaultSets);
			$thisReps = htmlspecialchars($obj -> defaultReps);
			
			echo "<div id='content'>";
			echo "<h2 id='title'>".$thisExercise."</h2>";
			echo "<h2 id='length'> X ".$thisReps." Reps</h2>";
			echo "<h2 id='length'>".$thisSets." Sets</h2>";		
			echo "</div>";
		}
		mysqli_free_result($result);
		mysqli_close($conn);
	?>
</div>

</html>
  