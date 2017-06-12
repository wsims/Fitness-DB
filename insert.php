
<?php

$valid = True;
$userduplicate = False;
$emptyfields = False;

$con = mysql_connect("classmysql.engr.oregonstate.edu","cs340_simsw","9855");
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}
 
mysql_select_db("cs340_simsw", $con);

if (empty($_POST["name"]) || empty($_POST["length"]))
{
  $valid = False;
  $emptyfields = True;
}

$conn = mysqli_connect('classmysql.engr.oregonstate.edu', 'cs340_simsw', '9855', 'cs340_simsw');
$table = 'Routine';
$result = mysqli_query($conn, $query);


if($valid == True)
{

$sql="INSERT INTO Routine (name, length)
VALUES
('$_POST[name]','$_POST[length]')";

header('Location: http://web.engr.oregonstate.edu/~pociusr/Fitness-DB/login.php');

} 
else
{
	if($emptyfields == False) {

	}
	else {

	}
}
mysql_close($con)

?>
