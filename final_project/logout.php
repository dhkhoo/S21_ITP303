<?php
	session_start(); // start session to destroy
	session_destroy(); // clears all existing sessions (all of the login info)
	header("Location: home.php");
?>