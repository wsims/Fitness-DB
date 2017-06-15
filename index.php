<?php
  session_start();
	if(isset($_SESSION['UserLogined']))
	{
		session_unset();
	  session_destroy();
	  header("Location: http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/home.php"); /* Redirect browser */
	  exit();
	}
	else {
		header("Location: http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/home.php"); /* Redirect browser */
	  exit();
	}

?>
