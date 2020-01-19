<?php
    include '../ActionsBDD/lecture_donnees.php';
    if(isset($_GET["annonce"])){
        $ref=$_GET["annonce"];
        $annonce=getAnnonce($ref);
        $titre=$annonce["TITRE"];
        $secteur=$annonce["SECTEUR"];
        $prix=$annonce["PRIX"];
        $descriptif=$annonce["DESCRIPTIF"];
        $actif=$annonce["ACTIF"];
    }
    //var_dump($annonce);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title><?php echo $titre ?></title>
</head>
<body>
    <a href="index.php" class="black-text">Retour à l'accueil</a>
    <center><h1><?php echo $titre ?></h1></center>
    <?php
        $img=getImages($ref);
        //var_dump($img);
        if(!empty($img)){
            foreach($img as $image){
    ?>
    <img src="<?php echo "img/".$image["NOM_IMAGE"] ?>" alt="">
    <?php
            }?>
            <br>
            <?php
        }
        else{?>
        <br><br>
            <center><i class="large material-icons">camera_alt</i></center>
            <?php
        }
    ?>
    <div class="row">
        <div class="col s6 m6">
            <h3 class="deep-purple-text"><?php echo $prix." €" ?></h3>
        </div>
        <div class="col s6 m6">
            <h3><?php echo "test"; ?></h3>
        </div>
    </div>
    
</body>
</html>