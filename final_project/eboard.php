<?php
  require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>SC Live | E-Board</title>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<style>

.profile {
  height: 350px;
  width: auto;
}

.card{
  width:350px;
}

.container{
  margin-bottom: 20px;
}


 /* iPad Styles ( >=768px )  */
@media (min-width: 768px) {
  .profile {
    height: 375px;
  }

  .card{
    width:375px;
  }
}

body {
    background-color: #fffcf7;
    margin:0px;
    padding:0px;
}


</style>
</head>
<body>


<?php include 'nav.php'; ?>


<div class="container">
    <h1>Our 2020-2021 Executive Board</h1>
    <p>Club events, workshops, and so much more are led by our amazing executive board.</p>
    <!-- row-cols-1 row-cols-sm-2 row-cols-md-3 -->
    <div class="row g-4">
  <div class="col">
    <div class="card mx-auto">
      <img src="img/EmmaMeiLiPFP.png" class="card-img-top profile" alt="...">
      <div class="card-body">
        <h5 class="card-title">EmmaMeiLi</h5>
        <p class="card-text">President & Founder</p>
        <a href="https://www.twitch.tv/emmameili" class="btn btn-danger" target="_blank">Twitch</a>
        <a href="https://beacons.page/emmameili" class="btn btn-danger" target="_blank">Socials</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card mx-auto">
      <img src="img/squidthegingerPFP.png" class="card-img-top profile" alt="...">
        <div class="card-body">
        <h5 class="card-title">squidtheginger</h5>
        <p class="card-text">Vice President</p>
        <a href="https://www.twitch.tv/squidtheginger" class="btn btn-danger" target="_blank">Twitch</a>
        <a href="https://twitter.com/squidtheginger" class="btn btn-danger" target="_blank">Twitter</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card mx-auto">
      <img src="img/SkylarNyxPFP.png" class="card-img-top profile" alt="...">
      <div class="card-body">
        <h5 class="card-title">SkylarNyx</h5>
        <p class="card-text">Secretary</p>
        <a href="https://www.twitch.tv/SkylarNyx" class="btn btn-danger" target="_blank">Twitch</a>
        <a href="https://skylarnyx.carrd.co/" class="btn btn-danger" target="_blank">Socials</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card mx-auto">
      <img src="img/ArmyBox1PFP.png" class="card-img-top profile" alt="...">
      <div class="card-body">
        <h5 class="card-title">ArmyBox1</h5>
        <p class="card-text">Treasurer</p>
        <a href="https://www.twitch.tv/ArmyBox1" class="btn btn-danger" target="_blank">Twitch</a>
        <a href="https://twitter.com/ArmyBox1" class="btn btn-danger" target="_blank">Twitter</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card mx-auto">
      <img src="img/xWordyPFP.png" class="card-img-top profile" alt="...">
      <div class="card-body">
        <h5 class="card-title">xWordy</h5>
        <p class="card-text">Events Chair</p>
        <a href="https://www.twitch.tv/xWordy" class="btn btn-danger" target="_blank">Twitch</a>
        <a href="https://www.instagram.com/wordy_ttv/" class="btn btn-danger" target="_blank">Instagram</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card mx-auto">
      <img src="img/boybunnyPFP.png" class="card-img-top profile" alt="...">
      <div class="card-body">
        <h5 class="card-title">boybunny</h5>
        <p class="card-text">Graphics Chair</p>
        <a href="https://www.twitch.tv/BoyBunny" class="btn btn-danger" target="_blank">Twitch</a>
        <a href="https://linktr.ee/boybunny" class="btn btn-danger" target="_blank">Socials</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card mx-auto">
      <img src="img/yobroitsjoPFP.jpg" class="card-img-top profile" alt="...">
      <div class="card-body">
        <h5 class="card-title">yobroitsjo</h5>
        <p class="card-text">Social Media Chair</p>
        <a href="https://www.twitch.tv/yobroitsjo" class="btn btn-danger" target="_blank">Twitch</a>
        <a href="https://linktr.ee/yobroitsjo" class="btn btn-danger" target="_blank">Socials</a>
      </div>
    </div>
  </div>
</div>


</div>

<div class="footer">
  <a class="mail" href="mailto:scliveclub@gmail.com"> Contact Us <i class="fas fa-envelope"></i> </a>
  <p> Made with ❤ by SC Live </p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>