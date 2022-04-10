<?php
    $api_url = "https://api.nasa.gov/planetary/apod?api_key=???";
    $raw = file_get_contents($api_url);
    $json = json_decode($raw);
    
    $source = $json->hdurl;
    $type = $json->media_type;
    $titre = $json->title;
    $desc = $json->explanation;
    $copyright = $json->copyright;
    $date = $json->date;
    // echo '<img src="'.$source.' " >';
?>
<!doctype html>
<html lang="fr">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Astronomie</title>
        <style>
            body{
                background-color:#EBEDEF;
            }
            .total{
                margin-top:6vh;
            }
            h3{
                text-align:center;
                text-transform: uppercase;
            }
            .p1{
                text-align:center;
                margin-left:10vw;
                margin-right:10vw;
                margin-bottom: 5vh;
            }
            .p2{
                text-align:center;
            }
            .img{
                padding-bottom: 0px;
                text-align: center;
            }
            h4{
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body>


    
    <div class="container total">
        <div class="shadow p-3 mb-5 bg-body rounded">
            <h3 class="fw-normal"><?php echo $type; ?> astronomique de la journnée</h3>
            <hr>
            <p class="p1">Chaque jour, une image ou une photographie différente de notre univers fascinant est présentée, accompagnée d'une brève explication écrite par un astronome professionnel.</p>
            <div class="shadow-none p-3 mb-5 bg-light rounded">
                <h4 class="text-center fw-normal">Titre : <?php echo $titre; ?> </h4>
                <p class="p2"><small>Copyright :  <?php echo $copyright; ?></small></p>
                <div class="img">
                    <a href="<?php echo $source; ?>" target="_blank"> 
                        <img class="img-fluid" src="<?php echo $source; ?>" >
                    </a>
                </div><!-- Fin img -->
                <hr>
                <p class="p1"><u>Date : <?php echo $date; ?></u></p>
                <p class="p1"> <?php echo $desc; ?></p>
            </div><!-- Fin shadow 2 -->
        </div><!-- Fin shadow 1 -->
        <div class="shadow p-3 mb-5 bg-body rounded text-center">
            <h4 class="fw-normal"></h4>
            <form action="" method="GET">
                <input type="date" name="laDate" id="datePickerId"><br><br>
                <button type="submit" class="btn btn-outline-dark btn-sm">Rechercher</button>
            </form>
            <br><br>
        
<?php
if(isset($_GET['laDate'])){
    // echo $_GET['laDate'];
    $api_url_recherche = "https://api.nasa.gov/planetary/apod/?date=".$_GET['laDate']."&api_key=Rldo8brTtf22uFX6gCfwrOWbfoFur4MIUVO37SVj";
    $raw_recherche = file_get_contents($api_url_recherche);
    $json_recherche = json_decode($raw_recherche);

    $source_recherche = $json_recherche->hdurl;
    $type_recherche = $json_recherche->media_type;
    $titre_recherche = $json_recherche->title;
    $desc_recherche = $json_recherche->explanation;
    $copyright_recherche = $json_recherche->copyright;
    $date_recherche = $json_recherche->date;
    ?>
            <h4 class="text-center fw-normal">Titre : <?php echo $titre_recherche; ?> </h4>
            <p class="p2"><small>Copyright :  <?php echo $copyright_recherche; ?></small></p>
            <div class="img">
                <a href="<?php echo $source_recherche; ?>" target="_blank"> 
                    <img class="img-fluid" src="<?php echo $source_recherche; ?>" >
                </a>
            </div><!-- Fin img -->
            <hr>
            <h5 class="fw-normal">Il s'agit d'une <?php echo $type; ?></h5>
            <p ><u>Date : <?php echo $date_recherche; ?></u></p>
            <p class="p1"> <?php echo $desc_recherche; ?></p>
        </div><!-- Fin shadow 3 -->
<?php
}
?>
    </div><!-- Fin container -->
    <script>
            var today = new Date();
            var dd = today.getDate();
            var mm = today.getMonth() + 1; //January is 0!
            var yyyy = today.getFullYear();

            if (dd < 10) {
            dd = '0' + dd;
            }

            if (mm < 10) {
            mm = '0' + mm;
            } 
                
            today = yyyy + '-' + mm + '-' + dd;
            document.getElementById("datePickerId").setAttribute("max", today);
        </script>


    </body>
</html>

