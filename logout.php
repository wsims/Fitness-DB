<?php
  session_start(); 
  session_unset(); //Unset the session
  session_destroy(); //Destroy the session
  header("Location: http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/home.php"); /* Redirect browser */
  exit();
?>
