<?php
include '../ActionsBDD/modificationDonnees.php';
if (isset($_GET["annonce"])){
    if (isset($_GET["cacher"])){
        var_dump($_GET["cacher"]);
        cacherAnnonce($_GET["annonce"]);
        echo "Modification réalisée"

    }
     var_dump($_GET["annonce"]);
}
?>