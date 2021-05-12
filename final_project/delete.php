<?php

require 'config.php';

if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) {
	header('Location: home.php');
}

if ( !isset($_GET['id']) || empty($_GET['id'])) {
	echo '<script>alert("Invalid Creator."); window.location.href="database.php" </script>';
} else {

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->connect_errno ) {
		echo $mysqli->connect_error;
		exit();
	}

	$mysqli->set_charset('utf8');

	$sql = "DELETE FROM creators WHERE id = " . $_GET['id'] . ";";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();

	echo '<script>alert("Successfully deleted."); window.location.href="database.php" </script>';

}

?>