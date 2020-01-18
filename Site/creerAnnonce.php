<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Poster une annonce</title>
</head>
<body>
<center><h4>Poster une annonce</h4></center>
    <div class="row">
        <form class="col s12" action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype='multipart/form-data'>
            <div class="row col s6 l6 m6 offset-l3">
                <div class="input-field">
                    <label for="nom">Titre : </label>
                    <input placeholder="Entrer un titre" id="titre" type="text" name="titre">
                </div>
                <div class="input-field">
                    <label for="secteur">Secteur :</label>
                    <input id="secteur" type="text" placeholder="Entrer un secteur" name="secteur">
                </div>
                <div class="input-field">
                    <label for="prix">Prix :</label>
                    <input id="prix" type="text" placeholder="Entrer un prix" name="prix">
                </div>
                <div class="input-field">
                    <label for="description">Description :</label><br>
                    <textarea name="description" id="description" cols="13" rows="3"></textarea>
                </div>
                <div class="input-field">
                    <label for="photo">Ajouter des photos :</label><br>
                    <input type="file" name="photo1" id="photo1" /><br>
                </div>
			</div>
            <div class="row col s6 l6 offset-l5">
				<input type="submit" name="add" value="Poster" class="btn is-success">
			</div>
        </form>
    </div>
    <a href="index.php">Retour au menu</a>
</body>
</html>

<?php
    if (isset($_POST["add"])){
        include '../ActionsBDD/insertion_donnees.php';
        include '../ActionsBDD/lecture_donnees.php';
        include '../ActionsBDD/verification_donnees.php';
        if((!empty($_POST["titre"])) || (!empty($_POST["secteur"])) || (!empty($_POST["prix"])) || (!empty($_POST["description"]))){
            $secteur=$_POST["secteur"];
            $titre=$_POST["titre"];
            $prix=$_POST["prix"];
            $description=$_POST["description"];
            if (verifierSecteur($secteur)){
                insererAnnonce($titre,$secteur,$prix,$description);
                echo "Annonce ajoutée<br>";
            }
            else{
                insererSecteur($secteur);
                insererAnnonce($titre,$secteur,$prix,$description);
            }
            if (isset($_FILES["photo1"]['size'])){
                $size=$_FILES["photo1"]['size'];
                $nomFichier=$_FILES["photo1"]['name'];
                $formats=array('.jpg','.jpeg','.gif','.png');
                $extensionFichier=".".strtolower(substr(strrchr($nomFichier, '.'),1));
                if ($_FILES["photo1"]['error'] >0){
                    echo "Il y a eu une erreur lors du transfert";
                }
                if (!in_array($extensionFichier,$formats)){
                    echo 'Pas le bon format de fichier';
                    die;
                }
                $tmpName=$_FILES["photo1"]['tmp_name'];
               // $Name=strtolower(trim($titre))."1";
                $Name=md5(uniqid(rand(),true));
                $img=$Name.$extensionFichier;
                $nomFichier="img/".$img;
                $resultat=move_uploaded_file($tmpName,$nomFichier);
                if ($resultat){
                    $ref=getRefMax()-1;
                    lierImage($img,$ref);
                    echo "Transfert terminé";
                }
            }
        }
    }
?>