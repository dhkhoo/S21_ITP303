<?php 
require 'config.php';

if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
    header("Location: home.php");
}

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if( $mysqli->connect_errno) {
    echo $mysqli->connect_error;
    exit();
}

$sql = "SELECT * FROM creators;";
$creators = $mysqli->query($sql);
if (!$creators) {
    echo $mysqli->error;
    exit();
}

$sql = "SELECT * FROM status;";
$status = $mysqli->query($sql);
if(!$status) {
    echo $mysqli->error;
    exit();
}

$mysqli->close();

$client = getenv("CLIENTID");
$authorization = getenv("AUTHORIZATION");


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>SC Live | Streamer Database</title>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<style>

.creator-name{
    text-decoration: none;
    font-family: 'Open Sans', sans-serif;
    font-size: 20px;
    color: #f35b53;
    font-weight: bold;
}
.creator-name:hover{
    color: #BB2D3B;
}

#add-form{
    width: 40%;
}

.warning-empty, .warning-dne {
    display: none;
}

</style>

</head>
<body>
<?php include 'nav.php'; ?>

<div class="container">
<h1> USC Streamer Database </h1>

<form action="add.php" method="GET" id="add-form" onsubmit="submit()">
    <div class="mb-3">
        <label for="username-id" class="form-label">Twitch Username</label>
        <input type="text" class="form-control" id="username-id" name="username">
    </div>  
    <p class="warning text-danger"> </p>
    <button type="submit" class="btn btn-outline-danger">Add New Streamer</button>
</form>

<div class="col-12">
<table class="table table-hover table-responsive mt-4">
    <thead>
        <tr>
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php while ( $row = $creators->fetch_assoc() ) : ?>
        <tr>
        <td>
            <a class="creator-name" href="https://www.twitch.tv/<?php echo $row['user_name']; ?>">
                <?php echo $row['user_name']; ?>
            </a>
        </td>
        <td>
            <?php 
            if($row['status_id'] == "1") {
                echo "Streamer";
            } else if($row['status_id'] == "2"){
                echo "Affiliate";
            } else if($row['status_id'] == "3") {
                echo "Partner";
            } ?>
        </td>
        <td>
        <a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-warning">Edit</a>
        <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
        </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
</div> 
</div>

<div class="footer">
    <a class="mail" href="mailto:scliveclub@gmail.com"> Contact Us <i class="fas fa-envelope"></i> </a>
    <p> Made with ❤ by SC Live </p>
</div>


<script src="https://embed.twitch.tv/embed/v1.js"></script>

<script> 
    let nameInput = "";
    let found = false;
    document.querySelector("#add-form").onsubmit = function() {
        event.preventDefault();

        // can do some validation
        nameInput = document.querySelector("#username-id").value;

        if(nameInput.length == 0){
            document.querySelector(".warning").innerHTML = "Username cannot be empty";
        } else {
            let searchEndpoint = "https://api.twitch.tv/helix/search/channels?query=" + nameInput;
            ajax(searchEndpoint, displayResults);
        }
    }

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
        for(j = 0; j < convertedResults.data.length; j++) {
            if(convertedResults.data[j].broadcaster_login == nameInput || convertedResults.data[j].display_name == nameInput) {
                found = true;
                window.location = "add.php?user_login=" + convertedResults.data[j].broadcaster_login;
            }
        }
        if(!found) {
            document.querySelector(".warning").innerHTML = "Account was not found";
        }
    }


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>