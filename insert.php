<html>
<body>
 
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
 
if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added, please return to the previous page";
} 
else
{
	if($emptyfields == False) {
echo "That username has already been taken! Please return to the previous page.";	
	}
	else {
echo "Please enter the required fields, please return to the previous page.";
	}
}

mysql_close($con)

?>
</body>
</html>