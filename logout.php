<?php
  session_start();
  session_unset();
  session_destroy();
  header("Location: http://web.engr.oregonstate.edu/~bolanosf/FitnessDB/home.php"); /* Redirect browser */
  exit();
?>
