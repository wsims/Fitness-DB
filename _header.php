
<link rel="stylesheet" href="assets/style.css">
<html>
      <header class = "header">
        <div class="wrapper">
          <div class = "nav">
            <?php session_start(); //Start a session
            if(isset($_SESSION['UserLogined'])): ?>  <!--Print out the name of the user if they are logged in-->
              <a href="logout.php">Logout</a>  <!--Display the logout button if a session is active and user is logged in-->
              <?php echo "<a>".$_SESSION['UserLogined']."<a>"; ?> 
            <?php else: ?>
              <a href="login.php">Log In</a>
              <a href="signup.php">Sign Up</a>
            <?php endif; ?>
              <a href="logView.php">Workout Log</a>
			        <a href="createWorkout.php">Create Workout</a>
          </div>
          <div class="logo">
            <a href="http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/home.php">Fitness DB</a>  <!--Link to the homepage-->
          </div>
        </div>
      </header>
</html>
