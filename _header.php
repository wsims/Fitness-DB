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
              <a href="login.php">Login | Sign Up</a>
            <?php endif; ?>
              <a href="logView.php">Workout Log</a>
			        <a href="createWorkout.php">Create Workout</a>
          </div>
          <div class="logo">
            <a href="http://web.engr.oregonstate.edu/~simsw/cs340/FitnessDB/">Fitness DB</a>
          </div>
        </div>
      </header>
</html>
    