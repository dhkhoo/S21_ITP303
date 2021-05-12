<?php
  require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>SC Live | Home</title>

<link rel="shortcut icon" type="image/jpg" href="img/logo.png"/>

<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

<style>

h1 {
	text-align: center;
	font-size: 60px;
	font-family: 'Roboto Mono', monospace;
	color:#f35b53;
}

h4{
	text-align: center;
    font-family: 'Open Sans', sans-serif;
}

h2{
    font-family: 'Roboto Mono', monospace;
}

p {
    font-family: 'Open Sans', sans-serif;
    font-size: 18px;
}

.btn{
    font-family: 'Open Sans', sans-serif;
    font-size: 20px;
    padding: 10px 25px;
    color: #fffcf7;
    margin-top: 15px;
}

.mission{
    width: 1000px;
    margin-left: auto;
    margin-right: auto;
    position: relative;
}

.section-dark{
	background-color:#A5A5A5;
	color: #fffcf7;
}

.row {
	margin:0px;
	padding:20px 0px;
	text-align: center;
}


.col-left{
    width: 100%;
}

.col-right{
    width: 100%;
}

.clear{
    clear: both;
}

.container-carousel{
    margin-top: 30px;
}

body {
    background-color: #fffcf7;
    margin:0px;
    padding:0px;
}


/* iPad Styles ( >=768px ) */
@media (min-width: 768px) {
    .carousel {
        width:600px;
        height:400px;
        margin: 0 auto;
    }

    .col-left{
        float:left;
        width: 50%;
    }

    .col-right{
        float:right;
        width: 50%;
        position: absolute;
        top:50%;
        left: 50%;
        transform: translateY(-50%);  
    }
}
/*font-family: 'Open Sans', sans-serif;
font-family: 'Dosis', sans-serif;
font-family: 'Roboto Mono', monospace;
Red:#f35b53
Yellow: #ffbf47
Black: #0e0e10
White: #fffcf7;
*/

</style>
</head>
<body>

<?php include 'nav.php'; ?>

<div class="row thick">
	<h1>Welcome to SC Live</h1>
	<h4>SC Live is a collection of streamers and content creators located at the University of Southern California</h4>
</div>
<div class="row row-cols-2 section-dark">
    <div class="mission">
    	<div class="col-left">
    		<h2>Our Mission</h2>
    		<p>Founded in 2020, it's our goal to foster an open environment for prospective, new, upcoming, and established Twitch streamers at USC to learn, grow, and develop not only as streamers but also as individuals and students!</p>
            <p>We want to bring together student and alumni streamers from USC to collaborate, connect, and help support each other's platforms!</p>
    	</div>
        <div class="col-right">
            <a class="links" href="https://303.itpwebdev.com/~dhkhoo/final_project/twitch.php"><button type="button" class="btn btn-danger"> Twitch Team <i class="fab fa-twitch"></i> </button></a>
            <br>
            <a class="links" href="https://discord.gg/G8g4P82" target="_blank"><button type="button" class="btn btn-danger"> Community Discord <i class="fab fa-discord"></i> </button></a>
        </div>
    </div>
</div>
<div class="container-carousel">
    <div id="indicators" class="carouselStyle carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/emmaStream.png" class="d-block w-100" alt="EmmaMeiLi Stream Capture">
        </div>
        <div class="carousel-item">
            <img src="img/sullyStream.png" class="d-block w-100" alt="PirateSully Stream Capture">
        </div>
        <div class="carousel-item">
            <img src="img/milapedeStream.png" class="d-block w-100" alt="Milapede Stream Capture">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#indicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#indicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>

<div class="row">
	<p>Are you a current USC student or Alumni interested in diving into the world of streaming and content creation?</p>
	<a href="mailto:scliveclub@gmail.com"><button type="button" class="btn btn-warning">Send us a message! <i class="fas fa-envelope"></i> </button></a>
</div>

<div class="footer">
	<a class="mail" href="mailto:scliveclub@gmail.com"> Contact Us <i class="fas fa-envelope"></i> </a>
	<p> Made with ❤ by SC Live </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>