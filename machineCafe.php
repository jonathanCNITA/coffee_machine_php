<?php
    include "fonctions.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Coffee machine in php</title>
</head>
<body>
    <h1>Coffee machine</h1>
    <p>Date du jour : <?= $today ?></p>

    <?= afficherBoisson($listeBoissons) ?>

    <p><?= $message ?></p>
    <p>Montant: <?= $montant ?> €</p>
    <h2>Recette boisson</h2>
    <ul>
        <?php preparerThe( 3 ) ?>
    </ul>
</body>
</html>