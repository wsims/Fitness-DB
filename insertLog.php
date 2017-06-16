<!-- insert.php -->
<?php
	include("_header.php");
	session_start();

// change the value of $dbuser and $dbpass to your username and password
  include 'connectvarsEECS.php';
  include 'routineView.php?id=1';


	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

 	$array;
 	$id;
 	$logRoutID;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$timeVal = date("Y-m-d");
	$username = $_SESSION['UserLogined'];
	$id= $_SESSION['RoutineID'];
	$array = $_SESSION['Array'];

		//echo "$username, $id".$timeVal."";
		$_user = mysql_real_escape_string($username);
		$_id = mysql_real_escape_string($id);

		$result = mysqli_query($conn,"INSERT INTO logRoutine (username, routineID, routineDate) VALUES ('$_user','$id','$timeVal')");
		if (!$result) {
			die("Query failed");

		}

		$result4 = mysqli_query($conn,"SELECT MAX(logRoutineID) FROM logRoutine ");
		if (!$result4) {
			die("Query failed");
		}
		$row = mysqli_fetch_row($result4);
		$logRoutID =$row[0];

	}

	$weights = array();
	for ($i = 1; $i <= 5; $i++) {
		array_push($weights, $_POST["weight{$i}"]);
	}

	for($i = 0; $i < count($array); ++ $i) {
		$temp = $array[$i];
		//$temp[0];

		$result2 = mysqli_query($conn,"INSERT INTO `logRoutineExercise` (`logExerciseID`, `logRoutineID`, `exerciseRoutineID`, `weight`) VALUES ('1', '$logRoutID', '$temp[0]', '$weights[$i]')");
		if (!$result2) {
			die("Query failed excercise");
		}
	}
  $conn->close();
?>

<link rel="stylesheet" href="assets/style.css">
<html>
<head>
	<title>Logged Excercise</title>
</head>

<a href="http://web.engr.oregonstate.edu/~bolanosf/FitnessDB/logView.php">Workout Log</a>


</html>
