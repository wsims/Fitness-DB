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
		//Grab the routineID from the session and store it in a variable
		if(isset($_SESSION['UserLogined']))
		{
			session_start();
			$_SESSION['RoutineID'] = $id;

		}

		$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		if (!$conn) {
			die('Could not connect: ' . mysql_error());
		}
		//Query to get the name of the routine and length of the routine
		$query = "SELECT name, length FROM Routine WHERE routineID = $id";
		$result = mysqli_query($conn, $query);
		$obj = $result -> fetch_object();
		$routineName = htmlspecialchars($obj -> name);
		$routineLength = htmlspecialchars($obj -> length);
		echo "<h1>".$routineName."</h1>";
		echo "<h2>Expected Length: ".$routineLength."</h2></br>";
		
		//Query to display the details of a routine to the page
		$query = "SELECT Exercise.name, defaultSets, defaultReps
FROM Exercise, routineExercise, Routine
WHERE Exercise.exerciseID = routineExercise.exerciseID
AND Routine.routineID = routineExercise.routineID
AND Routine.routineID = $id";

		//Query to get the routineExerciseID from the routine
		$exerciseArray = "SELECT DISTINCT routineExercise.routineExerciseID
		FROM Exercise, routineExercise, Routine
		WHERE Routine.routineID = routineExercise.routineID
		AND Routine.routineID = $id";
	
		$result2 = mysqli_query($conn, $exerciseArray);
		if (!$result2) {
			die("bad query");
		}

		$rows = [];
		while($row = mysqli_fetch_array($result2))
		{
		    $rows[] = $row;
		}
	//Store the routineExercise array into a session variable
    $_SESSION['Array'] = $rows;

		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}
		?>
		<form action="insertLog.php" enctype="multipart/form-data" method="POST">
		<?php
		$count = 0; //Keep track of the number of exercises that are in the routine for logging
		while($obj = $result -> fetch_object()){
			$thisExercise = htmlspecialchars($obj -> name);
			$thisSets = htmlspecialchars($obj -> defaultSets);
			$thisReps = htmlspecialchars($obj -> defaultReps);
			$count += 1; //Increment the count variable
			echo "<div id='content'>";
			echo "<h2 id='title'>".$thisExercise."</h2>";
			if ($thisSets == 1 && $thisReps ==1) { //These conditionals are for using plurals correctly
				echo "<h2 id='title'>".$thisSets." Set x ".$thisReps." Rep</h2>";
			} else if ($thisSets == 1 && $thisReps > 1) {
				echo "<h2 id='title'>".$thisSets." Set x ".$thisReps." Reps</h2>";
			} else if ($thisSets > 1 && $thisReps == 1) {
				echo "<h2 id='title'>".$thisSets." Sets x ".$thisReps." Rep</h2>";
			} else {
				echo "<h2 id='title'>".$thisSets." Sets x ".$thisReps." Reps</h2>";
			} //Give each input a unique name which is needed to adding the weights used to the log
			echo "<input name=\"weight$count\" type=\"text\" id=\"length\" style=\"width: 100px;\" required/><h2 id='length'>Weight:</h2></br>";
			echo "</div>";
		}
		?>
			<p>
				<input type="submit" name="submit" value="Save">
			</p>
		</form>
		<?php

		mysqli_free_result($result);
		mysqli_close($conn);
	?>
</div>

</html>
                                                                                      