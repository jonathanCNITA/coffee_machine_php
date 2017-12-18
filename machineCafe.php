<?php
    setlocale (LC_TIME, 'fr_FR.utf8','fra');

    $listeBoissons = array("expresso", " café long", "thé");
    $message = "En attente ...";
    $heureLocale = date("H")+1;
    $today = date("d.m.y  \| $heureLocale:i");
    $montant = 0;

    function afficherBoisson( $boissons ) {
        foreach($boissons as $boisson) {
            print "<h2>$boisson</h2>";
        }
    }
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
</body>
</html>