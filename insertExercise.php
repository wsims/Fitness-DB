<?php
// $rountineExercise=$_POST['routineExerciseID'];
$defaultReps=$_POST['defaultReps'];
$defaultSets=$_POST['defaultSets'];
$routineID=$_POST['routineID'];
$exerciseID=$_POST['exerciseID'];


if(true == true)
{
	$servername="classmysql.engr.oregonstate.edu";
	$username="cs340_simsw";
	$pw="9855";
	$DBname="cs340_simsw";


	$conn = mysqli_connect($servername,$username,$pw,$DBname);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	// $result = mysqli_query($conn,"INSERT INTO routineExercise (routineExerciseID, defaultReps, defaultSets, routineID, exerciseID) VALUES ('".$routineExerciseID."','".$defaultReps."','".$defaultSets."','".$routineID."','".$exerciseID."')");

	$result = mysqli_query($conn,"INSERT INTO routineExercise (routineExerciseID, defaultReps, defaultSets, routineID, exerciseID) VALUES ('1','".$defaultReps."','".$defaultSets."','".$routineID."','".$exerciseID."')");
}

mysqli_close($conn);

header("Location: http://web.engr.oregonstate.edu/~pociusr/Fitness-DB/createWorkoutStepTwo.php",TRUE,303);

?>
