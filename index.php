<?php
/**
 * A vérifier (databaseConnexion() empêche l'affichage du html)
 */
    /*include '../ConnexionBDD/connexion.php';
    include '../ActionsBDD/lecture_donnees';
        $db=databaseConnexion();
    echo 'test';*/
        try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=stagiaire4;charset=utf8', 'stagiaire4', '8uV5xiH4E');
        }
        catch (Exception $e)
        {
                die('Erreur : ' . $e->getMessage());
        }
        include '../ActionsBDD/lecture_donnees';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h5>Annonces</h5>
    <?php 
    echo 'affichage des annonces';
    $reponse = $bdd->query('SELECT * FROM EHT_ANNONCE');
    $donnees = $reponse->fetch();
    ?>
</body>
</html>