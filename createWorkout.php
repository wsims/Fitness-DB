<?php include("_header.php"); ?>
<link rel="stylesheet" href="assets/style.css">
<html>
<body>
<h1>Create your Routine</h1>
<h1></h1>
<form action="insertRoutine.php" method="post">
Name: <input type="text" name="name" /> Name your routine.
<br><br>
Length: <input type="text" name="length" /> How long does your routine take?
<br><br>

<input type="submit" />
</form>


<!-- <?php
$name=$_POST['name'];
$length=$_POST['length'];

if($name!="" && $length!="")
{
	$servername="classmysql.engr.oregonstate.edu";
	$username="cs340_simsw";
	$pw="9855";
	$DBname="cs340_simsw";


	$conn = mysqli_connect($servername,$username,$pw,$DBname);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$result = mysqli_query($conn,"INSERT INTO Routine (name, length) VALUES ('".$name."','".$length."')");
}

mysqli_close($conn);

header("Location: http://web.engr.oregonstate.edu/~pociusr/Fitness-DB/login.php",TRUE,303);

//header("Location: http://web.engr.oregonstate.edu/~pociusr/Fitness-DB/login.php?id=".$thisNid."'

?> -->

	
</body>

</html>