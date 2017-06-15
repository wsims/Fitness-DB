<?php include("_header.php"); ?>
<html>
	<head>
		<title>Sign Up</title>
	</head>

<body>
<h1> Sign Up</h1>

<div id=form>
<form action="signup.php" method="post">
	Enter your username:<br>
		<input type="text" name="Uname" value=""><br>
	Create a password:<br>
		<input type="text" name="Passw" value=""><br>
	<button type="submit"> Sign Up </button>

<br>
</form>
</div>

<?php
$user=$_POST['Uname'];
$pass=$_POST['Passw'];

include 'connectvarsEECS.php';

if($user!="" && $pass!="")
{
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

	$users = mysqli_query($conn,"SELECT `username` FROM User");
	if (!$users) {
		die("bad query");
	}

	$fields_num = mysqli_num_fields($users);
	$x=0;
	while($row = mysqli_fetch_row($users)) {
				if($row[0]== $user)
				{
					echo "<p>username already taken<p>";
					$x=1;
				}
	}

	if($x==0)
	{
		$result = mysqli_query($conn,"INSERT INTO User (username, password) VALUES ('".$user."','".$pass."')");
	}
}

mysqli_free_result($result);
mysqli_free_result($users);
mysqli_close($conn);
?>


</body>

</html>
