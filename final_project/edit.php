<?php

require 'config.php';

if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) {
	header('Location: home.php');
}

if ( !isset($_GET['id']) || empty($_GET['id']) ) {
	echo "Invalid ID";
	exit();
}


$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ( $mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

$mysqli->set_charset('utf8');

$sql = "SELECT * FROM creators WHERE id=". $_GET['id'] . ";";
$creators = $mysqli->query($sql);
if (!$creators) {
    echo $mysqli->error;
    exit();
}
$row = $creators->fetch_assoc();


$sql = "SELECT * FROM status;";
$status = $mysqli->query($sql);
if (!$status) {
	echo $mysqli->error;
	exit();
}

$mysqli->close();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SC Live | Edit Creator</title>
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" >
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
	<style>
		
		form{
			margin-top: 20px;
		}

		.form-group{
			margin: 10px 0px;
		}

</style>
</head>
<body>
	<?php include 'nav.php'; ?>
	<div class="container">
		<h1> Edit Creator Details </h1>
		<form action="editConfirmation.php" method="GET">
			<div class="form-group row">
				<label for="twitch-id" class="col-sm-3 col-form-label text-sm-right">Twitch ID</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="twitch-id" name="twitch_id" value="<?php echo $row['twitch_id']; ?>" required readonly>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="login-id" class="col-sm-3 col-form-label text-sm-right">Twitch Login </label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="login-id" name="user_login" value="<?php echo $row['user_login']; ?>" required readonly>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="user-id" class="col-sm-3 col-form-label text-sm-right">Twitch Username</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="user-id" name="user_name" value="<?php echo $row['user_name']; ?>" required readonly>
				</div>
			</div>
			
			<div class="form-group row">
				<label for="streamer-type-id" class="col-sm-3 col-form-label text-sm-right">
					Streamer Status
				</label>
				<div class="col-sm-9">
					<select name="status" id="streamer-type-id" class="form-control">
						<option value="" selected disabled>-- Select One --</option>

						<?php while( $status_row = $status->fetch_assoc() ): ?>
							<?php if ( $status_row['id'] == $row['status_id'] ) : ?>
								<option selected value="<?php echo $status_row['id']; ?>" required>
									<?php echo $status_row['status']; ?>
								</option>
							<?php else : ?>
								<option value="<?php echo $status_row['id']; ?>">
									<?php echo $status_row['status']; ?>
								</option>
							<?php endif; ?>
						<?php endwhile; ?>

					</select>
				</div>
			</div>

			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

			<div class="form-group row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 mt-2">
					<button type="reset" class="btn btn-warning">Reset</button>
					<button type="button" class="btn btn-danger" id="submit-button">Submit</button>
					
				</div>
			</div>
		</form>
	</div>

<script>

let element = document.querySelector("#submit-button");
element.onclick = ( function(){
	var conf = confirm("Are you sure you want to edit the creator's status?");
	if(conf == true){
		this.form.submit();
	}

});


</script>


</body>
</html>