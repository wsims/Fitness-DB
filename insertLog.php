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

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$timeVal = "2017-06-14" ;
		$timeVal=date("Y-m-d",strtotime($timeVal));
		$username = $_SESSION['UserLogined'];
		$id= $_SESSION['RoutineID'];
	  $array = $_SESSION['Array'];


		echo "$username, $id".$timeVal."";
		$_user = mysql_real_escape_string($username);
		$_id = mysql_real_escape_string($id);
		$result = mysqli_query($conn,"INSERT INTO logRoutine (username, routineID, routineDate) VALUES ('$_user','$id','2017-06-14')");
		if (!$result) {
			die("Query failed");
		}
	}

	$weights = array();
	for ($i = 1; $i <= 5; $i++) {
		array_push($weights, $_POST["weight{$i}"]);
	}
	for($i = 0; $i < count($weights); ++$i) {
    echo $weights[$i];
		//echo $array[$i];
	}

	for($i = 0; $i < count($array); ++$i) {
		$temp = $array[$i];
		//$temp[0];
		$result2 = mysqli_query($conn,"INSERT INTO `logRoutineExercise` (`logExerciseID`, `logRoutineID`, `routineExerciseID`, `weight`) VALUES ('1', '$id', '$temp[0]', '$weights[$i]')");
		if (!$result2) {
			die("Query failed");
		}
	}



  $conn->close();

?>
