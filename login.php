<?php include("_header.php"); ?>
<html>
	<head>
		<title>Login</title>
	</head>

<body>

<h1>Log In</h1>

<div id=form>
<form action="login.php" method="post">
	Username:<br>
		<input type="text" name="Username" value=""><br>
	Password:<br>
		<input type="password" name="Password" value=""><br>
	<button type="submit"> Log In </button>
	<a href="http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/signup.php"> Need an account? Sign Up!</a>

<?php
$LoginUser=$_POST['Username']; //Set session variable
$LoginPass=$_POST['Password']; //Set session variable
include 'connectvarsEECS.php';


if($LoginUser!="" && $LoginPass!="")
{
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$users = mysqli_query($conn,"SELECT * FROM User"); //Grab login information
	if (!$users) {
		die("bad query");
	}


	$fields_num = mysqli_num_fields($users);
	$userDB; //Create temp variables
	$passDB; //Create temp variables
	$x=0;
	while($row = mysqli_fetch_row($users)) {
			for($i=0; $i<$fields_num; $i++){
				if($i==0)
					$userDB=$row[$i];
				else
					$passDB=$row[$i];
			}

			if($userDB==$LoginUser && $passDB==$LoginPass) //Check if password matches username
				$x=1;
	}

	if($x==1)
	{
		session_set_cookie_params(0);
		session_start();
		$_SESSION['UserLogined'] = $LoginUser;
		$msg = "Logged in as ".  $_SESSION['UserLogined'];
		echo ($msg);
	}

	else
		echo "<p><b>Invalid Password or Username<b></p>"; //Print error message
}

mysqli_free_result($result);
mysqli_free_result($users);
mysqli_close($conn);

?>
</div>
<br>
</form>


</body>

</html>
                                                