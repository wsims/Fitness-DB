<?php
$name=$_POST['name'];
$length=$_POST['length'];

if(empty($_POST["name"]) || empty($_POST["length"]))
{
	mysqli_close($conn);
	header("Location: http://web.engr.oregonstate.edu/~pociusr/Fitness-DB/login.php", TRUE, 303);
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

	$checkResult = mysqli_query($conn, "SELECT name FROM Routine WHERE name = '$name'");
	if($checkResult = Null)
	{
			$result = mysqli_query($conn,"INSERT INTO Routine (name, length) VALUES ('".$name."','".$length."')");
			mysqli_close($conn);
			header("Location: http://web.engr.oregonstate.edu/~pociusr/Fitness-DB/createWorkoutStepTwo.php?name=".$name."",TRUE,303);
	}
	else
	{
			mysqli_close($conn);
			header("Location: http://web.engr.oregonstate.edu/~pociusr/Fitness-DB/login.php", TRUE, 303);
	}

}




//header("Location: http://web.engr.oregonstate.edu/~pociusr/Fitness-DB/login.php?id=".$thisNid."'


?>
