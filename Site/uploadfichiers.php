<?php
include '../ActionsBDD/insertion_donnees.php';
include '../ActionsBDD/lecture_donnees.php';
function uploadImage($image){
    $nomFichier=$image['name'];
    $formats=array('.jpg');
    $extensionFichier=".".strtolower(substr(strrchr($nomFichier, '.'),1));
    if ($image['error'] >0){
        echo "Il y a eu une erreur lors du transfert";
    }
    if (!in_array($extensionFichier,$formats)){
        echo 'Pas le bon format de fichier';
        die;
    }
    $tmpName=$image['tmp_name'];
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
?>