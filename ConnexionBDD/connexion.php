<?php
include_once('pdo.php');

function databaseConnexion(){
    $db_username = "stagiaire4";
    $db_password = "8uV5xiH4E";
    $db = fabriquerChaineConnexPDO();
    $conn = OuvrirConnexionPDO($db,$db_username,$db_password);
    return $conn;
}