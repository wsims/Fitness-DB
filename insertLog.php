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

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$timeVal = time();
		$username = $_SESSION['UserLogined'];
		echo $username;
		$result = mysqli_query($conn,"INSERT INTO logRoutine (username, routineID, routineDate) VALUES ('".$username."','".$id."','".$timeVal."')");
	}

	$weights = array();
	for ($i = 1; $i <= 5; $i++) {
		array_push($weights, $_POST["weight{$i}"]);
	}	
	for($i = 0; $i < count($weights); ++$i) {
    echo $weights[$i];
	}
  $conn->close();

?>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  