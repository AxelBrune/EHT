<?php
//include_once("../ConnexionBDD/connexion.php");

function getAllAnnonces(){
    /*$connexion = databaseConnexion();
    $req = "SELECT * FROM EHT_ANNONCE";
    $donneesRecues = [];
    LireDonneesPDO1($connexion,$req,$donneesRecues);
    return $donneesRecues;*/
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=stagiaire4;charset=utf8', 'stagiaire4', '8uV5xiH4E');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
    $reponse = $bdd->query('SELECT * FROM EHT_ANNONCE');
    $donnees = $reponse->fetch();

    return $donnees;
}

?>