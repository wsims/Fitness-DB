<!-- insert.php -->
<?php
	include("_header.php");
	session_start();

// change the value of $dbuser and $dbpass to your username and password
  include 'connectvarsEECS.php';



	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

 	$array;
 	$id;
 	$logRoutID;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$timeVal = date("Y-m-d");
	$username = $_SESSION['UserLogined']; //Grab session variable
	$id= $_SESSION['RoutineID']; //Grab session variable
	$array = $_SESSION['Array'];  //Grab session variable

		$_user = mysql_real_escape_string($username);
		$_id = mysql_real_escape_string($id);

		$result = mysqli_query($conn,"INSERT INTO logRoutine (username, routineID, routineDate) VALUES ('$_user','$id','$timeVal')");
		if (!$result) {
			echo "<h2 >Log in or sign up to save your workout.</h2>";
			die();
		}
		//Get the most recent logRoutineID from the count
		$result4 = mysqli_query($conn,"SELECT COUNT(logRoutineID) FROM logRoutine ");
		if (!$result4) {
			die("Query failed");
		}

		$row = mysqli_fetch_row($result4);
		$logRoutID =$row[0];

	}
	//Add the weights to an array
	$weights = array();
	for ($i = 1; $i <= 5; $i++) {
		array_push($weights, $_POST["weight{$i}"]);
	}

	for($i = 0; $i < count($array); ++ $i) {
		$temp = $array[$i];
		//Insert into the log
		$result2 = mysqli_query($conn,"INSERT INTO `logRoutineExercise` (`logExerciseID`, `logRoutineID`, `routineExerciseID`, `weight`) VALUES ('1', '$logRoutID', '$temp[0]', '$weights[$i]')");
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

<a href="http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/logView.php">Workout Log</a>

</html>
                                                                                                                                                                                                                                                                                                                                                                                                       