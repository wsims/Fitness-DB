<?php
$name=$_POST['name'];
$length=$_POST['length'];
if(empty($_POST["name"]) || empty($_POST["length"]))
{
	mysqli_close($conn);
	header("Location: http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/login.php", TRUE, 303);
}
else
{
	$servername="classmysql.engr.oregonstate.edu";
	$username="cs340_simsw";
	$pw="9855";
	$DBname="cs340_simsw";
	$conn = mysqli_connect($servername,$username,$pw,$DBname);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	$nameForQuery = mysql_real_escape_string($name);
	$checkResult = mysqli_query($conn, "SELECT name FROM Routine WHERE name = '$nameForQuery'");
	if(true == true)
	{
			$result = mysqli_query($conn,"INSERT INTO Routine (name, length) VALUES ('".$name."','".$length."')"); //Insert routine
			mysqli_close($conn);
			header("Location: http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/createWorkoutStepTwo.php?name=".$name."",TRUE,303); //Go to second part
	}
	else
	{
			mysqli_close($conn);
			header("Location: http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/", TRUE, 303); //If it fails return to homepage
	}
}

?>                                                                                                           