<?php
    include '../ActionsBDD/lecture_donnees.php';
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
    <title>Site d'annonces</title>
</head>
<body>
<?php
    if (isset($_GET["mode"])){
        if($_GET["mode"]=="admin"){?>
        <a href="index.php?mode=user" class="btn red">Passer en mode Utilisateur</a>
             <?php
        }
        else{?>
            <a href="index.php?mode=admin" class="btn red">Passer en mode Administrateur</a>
            <?php
        }
    }
?>
<center><h1>Petites annonces</h1></center>
<a href="creerAnnonce.php" class="waves-effect waves-light btn">Poster une annonce</a>
    <?php
        //var_dump(getAllAnnonces());
        $annonces=getAllAnnonces();
        foreach($annonces as $donnee){
            if ($donnee["ACTIF"]==0){
                $img=getImages($donnee["REFERENCE"]);
                ?>
                    <div class="row">
                        <div class="card">
                            <div class="card-content">
                            <?php if (!empty($img)){ ?>
                        <div class="col s3 m3">
                                <br><br><br>
                            <img src="<?php echo "img/".$img[0]["NOM_IMAGE"] ?>" alt="<?php $nomPhoto ?>" style="width: 100px; height:100px;">
                        </div>
                    <?php 
                    }
                    else{?>
                        <div class="col s3 m3">
                            <br><br><br><br>
                            <i class="large material-icons">camera_alt</i>
                        </div>
                    <?php
                    }
                    ?>
                        <div class="col s9 m9">
                        <br><br>
                            <a href="voirAnnonce.php?annonce=<?php echo $donnee["REFERENCE"]?>" class="deep-purple-text"><h5><?php echo $donnee["TITRE"]; ?></h5></a>
                            <?php
                                if(isset($_GET["mode"])){
                                    if ($_GET["mode"]=="admin"){?>
                                        <a href="modifierAnnonce.php?annonce=<?php echo $donnee["REFERENCE"]?>" class="btn yellow">Modifier</a>
                                        <a href="modifierAnnonce.php?annonce=<?php echo $donnee["REFERENCE"]?>&amp;cacher=true" class="btn orange">Ne pas afficher</a>
                                        <?php
                                    }
                                }
                            ?>
                            <br>
                            <?php echo $donnee["DESCRIPTIF"]."<br>"; ?>
                        </div>
                            </div>
                        </div>
                    </div>
                <br>
                <?php
            }

        }
    ?>
<br><br>
<h1>Secteurs</h1>
    <?php
        $secteurs=getAllSecteurs();
        foreach($secteurs as $sec){
            echo $sec["LIBELLE_SECTEUR"]." ";
        }
    ?>
<br><br>

</body>
</html>