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
    <title>Site d'annonces</title>
</head>
<body>
<h1>Annonces</h1>
    <?php
        var_dump(getAllAnnonces());
    ?>
<br><br>
<h1>Secteurs</h1>
    <?php
        var_dump(getAllSecteurs());
    ?>

<br><br>
<a href="creerAnnonce.php" class="waves-effect waves-light btn">Poster une annonce</a>
</body>
</html>