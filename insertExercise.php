<?php
// $rountineExercise=$_POST['routineExerciseID'];
$defaultReps=$_POST['defaultReps'];
$defaultSets=$_POST['defaultSets'];
$routineID=$_POST['routineID'];
$exerciseID=$_POST['exerciseID'];
$name=$_POST['name'];

if(true == true)
{
	$servername="classmysql.engr.oregonstate.edu";
	$username="cs340_simsw";
	$pw="9855";
	$DBname="cs340_simsw";

	//Connect to server
	$conn = mysqli_connect($servername,$username,$pw,$DBname);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	//Query for inserting exercise
	$result = mysqli_query($conn,"INSERT INTO routineExercise (routineExerciseID, defaultReps, defaultSets, routineID, exerciseID) VALUES ('1','".$defaultReps."','".$defaultSets."','".$routineID."','".$exerciseID."')");
}

mysqli_close($conn);
//Redict to home page
header("Location: http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/createWorkoutStepTwo.php?name=".$name."",TRUE,303);

?>
                                                                                                                                                                                                                                                                                                                                                                               