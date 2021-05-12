<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
    	<a class="navbar-brand" href="home.php">
      		<img src="img/logo.png" alt="" width="50" height="50">
    	</a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapseNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="twitch.php">Twitch Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="eboard.php">E-Board</a>
                </li>
                <?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]): ?>

                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="database.php">Streamer Database</a>
                    </li>
                <?php endif;?>
            </ul>
           <ul class="navbar-nav ms-auto">
            <?php if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]): ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">E-Board Login</a>
                </li>
            <?php else: ?>
                <div class="nav-link">Hello, <?php echo $_SESSION["username"]; ?>!</div>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Click to Logout</a>
                </li>
            <?php endif;?>
        </div>
    </div>
</nav>