<?php

require 'config.php';

if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) {
	header('Location: home.php');
}

if ( !isset($_GET['status']) || empty($_GET['status'])
	|| !isset($_GET['id']) || empty($_GET['id']) ) {

	echo '<script>alert("Please fill out all required fields."); window.location.href="database.php";</script>';

} else {

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	$sql = "UPDATE creators SET status_id=". $_GET['status'] .
			" WHERE id = " . $_GET['id'] .";";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();

	echo '<script>alert("Successfully Edited."); window.location.href="database.php"; </script>';

}

?>