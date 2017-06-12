<?php include("_header.php"); ?>
<link rel="stylesheet" href="assets/style.css">
<html>
<head>
	<title>Fitness DB</title>
</head>

<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvarsEECS.php';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	$table = 'Routine';
	$query1 = "SELECT Routine.name, Exercise.name from Routine
join routineExercise on Routine.routineID = routineExercise.routineID join Exercise on routineExercise.exerciseID = Exercise.exerciseID";
	//$query2 = "SELECT * FROM Routine, routineExercise WHERE Routine.routineID = routineExercise.routineID";

	$result = mysqli_query($conn, $query1);
	if (!$result) {
		die("Query to show fields from table failed");
	}

	$fields_num = mysqli_num_fields($result);
	echo "<table border='1'><tr>";
	// // printing table headers
	// for($i=0; $i<$fields_num; $i++) {
	// 	$field = mysqli_fetch_field($result);
	// 	echo "<td><b>{$field->name}</b></td>";
	// }
	echo "</tr>\n";
	while($row = mysqli_fetch_row($result)) {
		//echo "<tr>";
		// $row is array... foreach( .. ) puts every element
		// of $row to $cell variable
		//$previousRow = Null;
		if($previousRow != $row[0])
		{
		echo "$row[0]";
		echo "--------------------------";
		echo "<br><br>";
		}
		$previousRow = $row[0];
	    echo "$row[1]";
	    echo "<br><br>";
		//echo "</tr>\n";
	}

	mysqli_free_result($result);
	mysqli_close($conn);
	?>

</html>
