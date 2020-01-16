<?php
include_once("../ConnexionBDD/connexion.php");
include_once("../ActionBDD/lecture_donnees.php");
function insererSecteur($libelle){
    $connexion = databaseConnexion();
    $nSecteur=getNMax();
    $req = "INSERT INTO EHT_SECTEUR(N_SECTEUR,LIBELLE_SECTEUR)
    VALUES (:nSecteur,:libelle)";    
    $cur = preparerRequetePDO($connexion, $req);
    $cur = ajouterParamPDO($cur,':nSecteur',$nSecteur);
    $cur = ajouterParamPDO($cur,':libelle',strtoupper($libelle));
    $res = majDonneesPrepareesPDO($cur);
}

function insererAnnonce($titre,$secteur,$prix,$description){
    $connexion = databaseConnexion();
    $ref=getRefMax();
    $req = "INSERT INTO EHT_ANNONCE(REFERENCE,TITRE,N_SECTEUR, PRIX,DESCRIPTIF)
    VALUES (:ref,:titre,1,:prix, :descriptif)";    
    $cur = preparerRequetePDO($connexion, $req);
    $cur = ajouterParamPDO($cur,':ref',$ref);
    $cur = ajouterParamPDO($cur,':titre',$titre);
    $cur = ajouterParamPDO($cur,':prix',floatval($prix));
    $cur = ajouterParamPDO($cur,':descriptif', $description);
    $res = majDonneesPrepareesPDO($cur);
}
?>