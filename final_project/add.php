<?php

require 'config.php';

if ( !isset($_SESSION['logged_in']) || !$_SESSION['logged_in'] ) {
	header('Location: home.php');
}

if ( !isset($_GET['user_login']) || empty($_GET['user_login']) ) {
	$error = "No username was entered";
}

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

$userlogin = $_GET['user_login'];

$sql = "SELECT * FROM creators WHERE user_login = '" . $userlogin . "';";

$existing = $mysqli->query($sql);
if ($existing == false ) {
	echo $mysqli->error;
	exit();
}

if(mysqli_num_rows($existing) > 0) {
	$error = "Already part of the team";
}

if ($mysqli->connect_errno ) {
	echo $mysqli->connect_error;
	exit();
}

$mysqli->set_charset('utf8');


// Close DB Connection
$mysqli->close();

$client = getenv("CLIENTID");
$authorization = getenv("AUTHORIZATION");


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SC Live | Add Streamer</title>
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" >
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

	<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
	<style>
		#pfp{
    		border-radius: 50%;
    		width: 200px;
    		margin-bottom: 20px;
		}
		p {
		    font-family: 'Open Sans', sans-serif;
		    font-size: 18px;
		}

		@media (min-width: 768px) {
		   #pfp{
	    		border-radius: 50%;
	    		width: 300px;
			}
		}

	</style>
</head>
<body>
	<?php include 'nav.php'; ?>

	<div class="container">
    	<div class="row"> 
    		<h1> Add Creator </h1>
		<div class="mb-3">
	        <div class="font-italic text-danger">
	            <?php
	                if ( isset($error) && !empty($error) ) {
	                    echo $error;
	                }
	            ?>
	        </div>
	        </div>
	    	<div class="col">
				<p id="twitchID">Twitch ID: </p>
				<p id="userLogin">User Login: </p>
				<p id="userName">User Name: </p>
				<p id="status">Status: </p>
				<p id="bio">Description: </p>
			</div>
			<div class="col">
				<div id="header"> </div>
			</div>
		</div>

		<?php if ( isset($error) && !empty($error) ): ?>
			<a href="database.php"><button type="button" class="btn btn-danger"> Return to Database </button></a>
		<?php else: ?>
			<div id="addition"><a href=""><button type="button" class="btn btn-danger"> Confirm Addition </button></a></div>
		<?php endif; ?>
	</div> 

<script>

	let addEndpoint = "https://api.twitch.tv/helix/users?login=<?php echo $userlogin ?>";
	ajax(addEndpoint, displayResults);

	function ajax(endpoint, returnFunction) {
	    let httpRequest = new XMLHttpRequest();
	    httpRequest.open("GET", endpoint);
	    httpRequest.setRequestHeader('Client-Id', '<?php echo $client ?>');
	    httpRequest.setRequestHeader('Authorization', '<?php echo $authorization ?>');
	    httpRequest.send();

	    httpRequest.onreadystatechange = function() {
	        if(httpRequest.readyState == 4) {
	            if(httpRequest.status == 200) {
	                returnFunction(httpRequest.responseText);
	            }
	            else {
	                console.log("Failed Request");
	                console.log(httpRequest.status);
	            }
	        }
	    }
    }
    
    function displayResults(results) {
        let convertedResults = JSON.parse(results);
        console.log(convertedResults);

        let twitchID = convertedResults.data[0].id;
        let userLogin = convertedResults.data[0].login;
        let userName = convertedResults.data[0].display_name;
        let status = convertedResults.data[0].broadcaster_type;
        let bio = convertedResults.data[0].description;
        
        console.log(status);

        if(status == "affiliate"){
        	status = "Affiliate";
        } else if(status == "partner"){
        	status = "Partner";
        } else {
        	status = "Streamer";
        }

        document.getElementById("twitchID").innerHTML = "<strong>Twitch ID:</strong> " + twitchID;
        document.getElementById("userLogin").innerHTML = "<strong>User Login:</strong> " + userLogin;
        document.getElementById("userName").innerHTML = "<strong>User Name:</strong> " + userName;
        document.getElementById("status").innerHTML = "<strong>Status:</strong> " + status;
        document.getElementById("bio").innerHTML = "<strong>Description:</strong> " + bio;

        document.getElementById("header").innerHTML = "<img src=" + convertedResults.data[0].profile_image_url + " id='pfp' alt='profile picture'>";

        <?php if ( isset($error) && !empty($error) ): ?>

        <?php else: ?>
                document.getElementById("addition").innerHTML = "<a href='addConfirmation.php?twitch_id=" + twitchID + "&user_login=" + userLogin + "&user_name=" + userName + "&status=" + status + "'><button type='button' class='btn btn-danger'> Confirm Addition </button></a>";
         <?php endif;?>
        

    }
</script>

</body>
</html>