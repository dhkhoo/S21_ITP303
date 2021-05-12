<?php

require 'config.php';

if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) {
	header('Location: home.php');
}

if ( !isset($_GET['twitch_id']) || empty($_GET['twitch_id']) 
	|| !isset($_GET['user_login']) || empty($_GET['user_login'])
	|| !isset($_GET['user_name']) || empty($_GET['user_name'])
	|| !isset($_GET['status']) || empty($_GET['status']) ) {

	echo '<script>alert("Please fill out all required fields.") window.location.href="database.php"; </script>';

} else {

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	if ( $mysqli->errno ) {
		echo $mysqli->error;
		exit();
	}

	if($_GET['status'] == 'Streamer'){
		$status_id = "1";
	} else if($_GET['status'] == 'Affiliate'){
		$status_id = "2";
	} else if($_GET['status'] == 'Partner') {
		$status_id = "3";
	}
	$sql = "INSERT INTO creators (twitch_id, user_login, user_name, status_id)
					VALUES ('" 
					. $_GET['twitch_id'] 
					. "', '"
					. $_GET['user_login']
					."', '"
					. $_GET['user_name']
					."', "
					. $status_id
					.");";

	//echo "<hr>" . $sql . "<hr>";

	$results = $mysqli->query($sql);
	if ( !$results ) {
		echo $mysqli->error;
		exit();
	}

	$mysqli->close();

	echo '<script>alert("Successfully added."); window.location.href="database.php"; </script>';

}

?>