<?php
require 'config.php';
if(!isset($_SESSION["logged_in"]) || !$_SESSION["logged_in"]) {
    if ( isset($_POST['username']) && isset($_POST['password']) ) {
        if ( empty($_POST['username']) || empty($_POST['password']) ) {
            $error = "Please enter username and password.";
        } else {
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if($mysqli->connect_errno) {
                echo $mysqli->connect_error;
                exit();
            }

            $passwordInput = hash("sha256", $_POST["password"]);

            $sql = "SELECT * FROM users WHERE username = '" . $_POST['username'] . "' AND password = '" . $passwordInput . "';";

            //echo "<hr>" . $sql . "<hr>";
            
            $results = $mysqli->query($sql);

            if(!$results) {
                echo $mysqli->error;
                exit();
            }

            if($results->num_rows > 0) {
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["logged_in"] = true;
                header("Location: database.php");
            
            }
            else {
                $error = "Invalid username or password.";
            }
        } 
    }
} else { 
    header("Location: database.php");
}

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>SC Live | E-Board Login</title>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<style>

body {
    background-color: #fffcf7;
    margin:0px;
    padding:0px;
}

.container{
    margin: 30px 0px;
    margin-right: auto;
    margin-left:auto;
    height: 700px;
}

form{
    width: 80%;
}


</style>
</head>
<body>

<?php include 'nav.php'; ?>

<div class="container">
    
    
<div class="row">
    <h1> Log In </h1>
     <p> Welcome back! This area is for authorized users only. </p>

</div>
<div class="row">


<form method="POST" action="login.php">
    
    <div class="mb-3">
        <label for="username-id" class="form-label">Username</label>
        <input type="text" class="form-control" id="username-id" name="username">
    </div> 

    <div class="mb-3">
        <label for="password-id" class="form-label">Password</label>
        <input type="password" class="form-control" id="password-id" name="password">
    </div>

    <div class="mb-3">
        <div class="font-italic text-danger">
            <?php
                if ( isset($error) && !empty($error) ) {
                    echo $error;
                }
            ?>
        </div>
    </div>

    <button type="reset" class="btn btn-warning">Reset</button>
    <button type="submit" class="btn btn-danger">Log In</button>

</form>
</div>
</div>

<div class="footer">
    <a class="mail" href="mailto:scliveclub@gmail.com"> Contact Us <i class="fas fa-envelope"></i> </a>
    <p> Made with ❤ by SC Live </p>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>