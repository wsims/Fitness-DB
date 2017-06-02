<!DOCTYPE html>
<!-- showTable.php -->
<html>
	<head>
		<title>Login</title>
	</head>
<body>



<h1> sign-up</h1>

<form action="login.php" method="post">
	User name:<br>
		<input type="text" name="Uname" value=""><br>
	password:<br>
		<input type="text" name="Passw" value=""><br>
	<input type="submit">
<br>

</form>

<h1>login</h1>

<form action="login.php" method="post">
	User name:<br>
		<input type="text" name="Username" value=""><br>
	password:<br>
		<input type="text" name="Password" value=""><br>
	<input type="submit">
<br>
</form>

<?php
$user=$_POST['Uname'];
$pass=$_POST['Passw'];
$LoginUser=$_POST['Username'];
$LoginPass=$_POST['Password'];


if($user!="" && $pass!="" && $LoginUser=="" && $LoginPass=="")
{
	$servername="classmysql.engr.oregonstate.edu";
	$username="cs340_simsw";
	$pw="9855";
	$DBname="cs340_simsw";

	$conn = mysqli_connect($servername,$username,$pw,$DBname);
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
		echo "<p><b>welcome to our website<b><p>";
	}
	
}

if($user=="" && $pass=="" && $LoginUser!="" && $LoginPass!="")
{
	$servername="classmysql.engr.oregonstate.edu";
	$username="cs340_bolanosf";
	$pw="0468";
	$DBname="cs340_bolanosf";

	$conn = mysqli_connect($servername,$username,$pw,$DBname);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}
	
	$users = mysqli_query($conn,"SELECT * FROM User");
	if (!$users) {
		die("bad query");
	}
	
	
	$fields_num = mysqli_num_fields($users);
	$userDB;
	$passDB;
	$x=0;
	while($row = mysqli_fetch_row($users)) {	
			
			for($i=0; $i<$fields_num; $i++){
				if($i==0)
					$userDB=$row[$i];
				else
					$passDB=$row[$i];
			}
			
			if($userDB==$LoginUser && $passDB==$LoginPass)
				$x=1;
	}
	
	if($x==1)
		echo "<p><b>logined as $LoginUser<b><p>";
	else
		echo "<p><b>password or username incorrect<b><p>";
	
}

mysqli_free_result($result);
mysqli_free_result($users);
mysqli_close($conn);
?>

	
</body>

</html>