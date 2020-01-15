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
        <form class="col s12" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="row col s6 l6 m6 offset-l3">
                <div class="input-field">
                    <input placeholder="Entrer un titre" id="titre" type="text" name="titre">
                    <label for="nom">Titre : </label>
                </div>
                <div class="input-field">
                    <input id="secteur" type="text" placeholder="Entrer un secteur" name="secteur">
                    <label for="secteur">Secteur :</label>
                </div>
                <div class="input-field">
                    <input id="prix" type="text" placeholder="Entrer un prix" name="prix">
                    <label for="prix">Prix :</label>
                </div>
                <div class="input-field">
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    <label for="description">Description :</label>
                </div>
			</div>
            <div class="row col s6 l6 offset-l5">
				<input type="submit" name="add" value="Poster"class="btn is-success">
			</div>
        </form>
    </div>
</body>
</html>

<?php
    if (isset($_POST["add"])){
        include '../ActionsBDD/insertion_donnees.php';
        if((!empty($_POST["titre"])) || (!empty($_POST["secteur"])) || (!empty($_POST["prix"])) || (!empty($_POST["description"]))){
            $titre=$_POST["titre"];
            $secteur=$_POST["secteur"];
            $prix=$_POST["prix"];
            $description=$_POST["description"];
            insererAnnonce($titre,$secteur,$prix,$description);
            echo "Annonce ajoutée";
        }
    }
?>