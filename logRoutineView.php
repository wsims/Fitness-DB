
<?php include("_header.php"); 
	session_start ();
?>
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
		$query = "SELECT Routine.name, logRoutine.routineDate FROM logRoutine, Routine WHERE logRoutineID = $id AND logRoutine.routineID = Routine.routineID";
		$result = mysqli_query($conn, $query);
		$obj = $result -> fetch_object();
		$routineName = htmlspecialchars($obj -> name);
		$routineDate = htmlspecialchars($obj -> routineDate);
		echo "<h1>".$routineName."</h1>";
		echo "<h2>Date Completed: ".$routineDate."</h2></br>";

		$query = "SELECT DISTINCT Exercise.name, defaultSets, defaultReps, logRoutineExercise.weight FROM Exercise, routineExercise, Routine , logRoutineExercise, logRoutine
		WHERE Exercise.exerciseID = routineExercise.exerciseID AND Routine.routineID = routineExercise.routineID
		AND routineExercise.routineExerciseID = logRoutineExercise.routineExerciseID
		AND logRoutineExercise.logRoutineID = $id";
		
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
	
			$count = 0;
			while($obj = $result -> fetch_object()){ 
			$thisExercise = htmlspecialchars($obj -> name);
			$thisSets = htmlspecialchars($obj -> defaultSets);
			$thisReps = htmlspecialchars($obj -> defaultReps);
			$thisWeight = htmlspecialchars($obj -> weight);
			$count += 1; 
			echo "<div id='content'>";
			echo "<h2 id='title'>".$thisExercise."</h2>";
			if ($thisSets == 1 && $thisReps ==1) {
				echo "<h2 id='title'>".$thisSets." Set x ".$thisReps." Rep</h2>";
			} else if ($thisSets == 1 && $thisReps > 1) {
				echo "<h2 id='title'>".$thisSets." Set x ".$thisReps." Reps</h2>";
			} else if ($thisSets > 1 && $thisReps == 1) {
				echo "<h2 id='title'>".$thisSets." Sets x ".$thisReps." Rep</h2>";
			} else {
				echo "<h2 id='title'>".$thisSets." Sets x ".$thisReps." Reps</h2>";
			}
			echo "<h2 id='length'>Weight: ".$thisWeight." lbs.</h2></br>"; 
			echo "</div>";
			}
		
		mysqli_free_result($result);
		mysqli_close($conn);
	?>
</div>
</html>                                                                                              