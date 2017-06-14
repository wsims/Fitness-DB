<?php include("_header.php");?>
<link rel="stylesheet" href="assets/style.css">
<html>
<head>
	<title>Fitness Database</title>
</head>
<div id="contentWrapper">
<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvarsEECS.php';
	session_start();
	$user = $_SESSION['UserLogined'];

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	if(isset($_SESSION['UserLogined']))
	{

		$_user = mysql_real_escape_string($user);
		$query = "SELECT Routine.routineID, Routine.name, logRoutine.routineDate FROM logRoutine, Routine WHERE (logRoutine.username = '$_user') AND (Routine.routineID=logRoutine.routineID)";
		
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die("Query to show fields from table failed");
		}

		while($obj = $result -> fetch_object()){
			$thisNid = htmlspecialchars($obj -> routineID);
			$thisName = htmlspecialchars($obj -> name);
			$thisDate = htmlspecialchars($obj -> routineDate);
			echo "<div id='content'>";
			echo "<a href='http://web.engr.oregonstate.edu/~bolanosf/FitnessDB/logRoutineView.php?id=".$thisNid."' style='text-decoration:none'>";
			echo "<h2 id='title'>".$thisName."</h2>";
			echo "</a>";
			echo "<h2 id='length'> completed ".$thisDate."</h2>";	
			echo "</div>";
		}
	}
	
	else
		echo "<h2 > login or sign up to view completed routines</h2>";
	
	mysqli_free_result($result);
	mysqli_close($conn);
	?>
</div>
</html>
