<?php include("_header.php"); ?>
<link rel="stylesheet" href="assets/style.css">
<html>
<head>
	<title>Fitness DB</title>
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$timeVal = time();




}
?>



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
		?>
		<form action="insertLog.php" enctype="multipart/form-data" method="POST"> 
		<?php
		$count = 0;
		while($obj = $result -> fetch_object()){ 
			$thisExercise = htmlspecialchars($obj -> name);
			$thisSets = htmlspecialchars($obj -> defaultSets);
			$thisReps = htmlspecialchars($obj -> defaultReps);
			$count += 1; 
			echo "<div id='content'>";
			echo "<h2 id='title'>".$thisExercise."</h2>";
			if ($thisReps == 1) {
				echo "<h2 id='length'> x ".$thisReps." Rep</h2>";	
			} else {
				echo "<h2 id='length'> x ".$thisReps." Reps</h2>";
			}
			if ($thisSets == 1) {
				echo "<h2 id='length'>".$thisSets." Set</h2>";	
			} else {
				echo "<h2 id='length'>".$thisSets." Sets</h2>";	
			}
			echo " Weight: <input name=\"weight$count\" type=\"text\" required/></br>"; 
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

</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        