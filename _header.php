
<link rel="stylesheet" href="assets/style.css">
<html>
      <header class = "header">
        <div class="wrapper">
          <div class = "nav">
            <?php session_start();
            if(isset($_SESSION['UserLogined'])): ?>
              <a href="logout.php">Logout</a>
              <?php echo "<a>".$_SESSION['UserLogined']."<a>"; ?>
            <?php else: ?>
              <a href="login.php">Log In</a>
              <a href="signup.php">Sign Up</a>
            <?php endif; ?>
              <a href="logView.php">Workout Log</a>
			        <a href="createWorkout.php">Create Workout</a>
          </div>
          <div class="logo">
            <a href="http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/home.php">Fitness DB</a>
          </div>
        </div>
      </header>
</html>
