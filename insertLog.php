<!-- insert.php -->
<?php
// change the value of $dbuser and $dbpass to your username and password
	include 'connectvarsEECS.php';
  include 'routineView.php?id=1';

	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die('Could not connect: ' . mysql_error());
	}

/*	$table = 'Users';
	$query = "SELECT username FROM $table ";
	$result = mysqli_query($conn, $query);
	if (!$result) {
		die("Query to show fields from table failed");
	}
	while($row = mysqli_fetch_row($result)) {
		foreach($row as $cell)
			if ($cell == $_POST["username"]) {
				echo "Duplicate username, please try again.";
				$valid = false;
			}
	}

  if ($valid == true) {
    $sql = "INSERT INTO Users (username, firstName, lastName, email, password, age)
    VALUES ('$username', '$firstName', '$lastName', '$email', '$password', '$age')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
			echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
	*/
	$weights = array();
	for ($i = 1; $i <= 5; $i++) {
		array_push($weights, $_POST["weight{$i}"]);
	}	
	for($i = 0; $i < count($weights); ++$i) {
    echo $weights[$i];
	}
  $conn->close();

?>                                                                                                                                                                                                                                                                                                           