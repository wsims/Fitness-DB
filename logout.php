<?php
  session_start();
  session_unset();
  session_destroy();
  header("Location: http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB"); /* Redirect browser */
  exit();
?>

