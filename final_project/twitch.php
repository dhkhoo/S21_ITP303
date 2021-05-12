<?php 

require 'config.php';

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


if( $mysqli->connect_errno) {
    echo $mysqli->connect_error;
    exit();
}

$sql = "SELECT * FROM creators;";

$results = $mysqli->query($sql);
if (!$results) {
    echo $mysqli->error;
    exit();
}

$rowcount = mysqli_num_rows($results);

$mysqli->close();

$client = getenv("CLIENTID");
$authorization = getenv("AUTHORIZATION");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>SC Live | Twitch Team</title>
<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

<script defer src="https://use.fontawesome.com/releases/v5.0.2/js/all.js"></script>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200;300;400;500;600;700;800&family=Open+Sans&family=Roboto+Mono:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
<style>

.pfp {
    width: 75px;
    height: 75px;
    border-radius: 50%;
    margin:5px;
    padding: 10px;
}

.card {
    position: relative;
    width: 350px;
}

.featured, .content {
    margin-bottom: 20px;
}

.feature{
    text-decoration: none;
    color: #f35b53;
}

.feature:hover{
    text-decoration: none;
    color: #BB2D3B;
}

.bio{
    font-size: 20px;
    font-family: 'Open Sans', sans-serif;
}

#game, #status{
    font-size: 15px;
    font-family: 'Open Sans', sans-serif;
}

.shown{
    display:block;
    border-radius: 50%;
}

.hidden{
    display: none;
    border-radius: 50%;
    float: right;

}

.hidden-img{
    border-radius: 50%;
    width: 40%;
}

.partner-img{
    height: 20px;
}

.partner {
    color: #9147FF;
    font-weight: bold;
}

.affiliate {
    color: #ffbf47;
    font-weight: bold;
}

.streamer {
    font-weight: bold;
}

@media (min-width: 768px) {
    .hidden{
        display: block;

    }
    .shown{
        display:none;
    }
    .bio{
        font-size: 22px;
    }
    #game, #status{
        font-size: 20px;
    }

    .card {
        width: 305px;
    }
}

@media (min-width: 1400px) {
    .card {
        width: 400px;
    }
}


</style>

</head>
<body>

<?php include 'nav.php'; ?>


<div class="container featured">
    <div class="row">
        <h1> Featured Creator </h1>
    <div class="col">
        <img class="shown mx-auto" src="img/PirateSullyPFP.png">
        <img class="hidden-img hidden" src="img/PirateSullyPFP.png">
        <h2> PirateSully </h2>

        <h2> <a class="feature" href="https://www.twitch.tv/PirateSully"> ttv/piratesully </a> </h2>
        <p class="bio"> Just your friendly neighborhood, game designer, writer, comedian, V.O. artist, guitarist, singer/songwriter, chef? Come hang out! </p>
        <p id="status"> </p> 
        <p id="game"> </p>
        
    </div>
        
    <div class="col hidden">
        <div id="piratesully"></div>
    </div>
    </div>
</div>


<div class="container content">
<div class="row">
    <h1> Twitch Team </h1>
</div>

<!-- change content below based on the select form above -->
<div class="row row-cols-lg-3 g-4">

    <?php while($row = $results->fetch_assoc()) :?>

        <div class="col">
        <div class="card mx-auto">
            <div id="<?php echo $row['user_login']; ?>" class="creator"></div>
            <h5 class="card-title" id="<?php echo $row['user_login']; ?>header"></h5>
            <div class="card-body">
                <p id="<?php echo $row['user_login']; ?>type"> </p>
                <p class="card-text" id="<?php echo $row['user_login']; ?>bio"></p>
                <a href="https://www.twitch.tv/<?php echo $row['user_login']; ?>" class="btn btn-danger" target="_blank">Twitch</a>
            </div>
        </div>
    </div>
    <?php endwhile;?>

</div>
</div>

<div class="footer">
    <a class="mail" href="mailto:scliveclub@gmail.com"> Contact Us <i class="fas fa-envelope"></i> </a>
    <p> Made with ❤ by SC Live </p>
</div>


<script src="https://embed.twitch.tv/embed/v1.js"></script>

<script> 
    let featuredEndpoint = "https://api.twitch.tv/helix/search/channels?query=piratesully";
    ajax(featuredEndpoint, displayFeatured);

    function displayFeatured(results) {
        let convertedResults = JSON.parse(results);

        for(i = 0; i < convertedResults.data.length; i++) {
            if(convertedResults.data[i].id == "505379414") {
                document.querySelector("#game").innerHTML = "Last Streaming: " + convertedResults.data[i].game_name;

                if(convertedResults.data[i].is_live) {
                    document.querySelector("#status").innerHTML = "Live Now!" ;
                } else {
                    document.querySelector("#status").innerHTML = "";
                }

                new Twitch.Embed(convertedResults.data[i].broadcaster_login, {
                autoplay: false,
                layout: "video",
                muted:true,
                width: 600,
                height: 400,
                channel: convertedResults.data[i].broadcaster_login
            });
                break;
            }
        }
    }

    function ajax(endpoint, returnFunction) {
    let httpRequest = new XMLHttpRequest();
    httpRequest.open("GET", endpoint);
    httpRequest.setRequestHeader('Client-Id', '<?php echo $client ?>');
    httpRequest.setRequestHeader('Authorization', '<?php echo $authorization ?>');
    httpRequest.send();

    httpRequest.onreadystatechange = function() {
        // readyState == 4 when we have a full response
        if(httpRequest.readyState == 4) {
            // Check if we got a success or error
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

    let creators = document.querySelectorAll(".creator");

    let loadedEndpoint = "https://api.twitch.tv/helix/users?";
    for(i = 0; i < creators.length; i++) {
        loadedEndpoint = loadedEndpoint + "login=" + creators[i].id + "&";
        //console.log(creators[i].id);
    }
    ajax(loadedEndpoint, displayResults);
    
    function displayResults(results) {
        let convertedResults = JSON.parse(results);
        for(j = 0; j < convertedResults.data.length; j++) {
            document.getElementById(convertedResults.data[j].login + "header").innerHTML = "<img src=" + convertedResults.data[j].profile_image_url + " class='pfp' alt='profile picture'>" + convertedResults.data[j].display_name;
            document.getElementById(convertedResults.data[j].login + "bio").innerHTML = convertedResults.data[j].description;
            if(convertedResults.data[j].broadcaster_type == "partner") {
                document.getElementById(convertedResults.data[j].login + "type").innerHTML = "<div class='partner'><img src='img/partner.png' class='partner-img'></img> Partner</div>";
            } else if (convertedResults.data[j].broadcaster_type == "affiliate") {
                document.getElementById(convertedResults.data[j].login + "type").innerHTML = "<div class='affiliate'><i class='fab fa-twitch'></i> Affiliate</div> ";
            } else {
                document.getElementById(convertedResults.data[j].login + "type").innerHTML = "<div class='streamer'><i class='fas fa-tv'></i> Streamer </div>";

            }
        }
    }


</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>