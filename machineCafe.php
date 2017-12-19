<?php
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


    function expresso( $nbSucres ) {
        $recette = array("café", "eau", $nbSucres." sucre(s)");
        foreach($recette as $ingredient) {
            print "<li>".$ingredient."</li>";
        }
       
    }


    function cafeLong( $nbSucres ) {
        $recette = array("2 * café", "2 * eau", $nbSucres." sucre(s)");
        foreach($recette as $ingredient) {
            print "<li>".$ingredient."</li>";
        }
       
    }


    function the( $nbSucres ) {
        $recette = array("1 * thé", "2 * eau", $nbSucres." sucre(s)");
        foreach($recette as $ingredient) {
            print "<li>".$ingredient."</li>";
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
    <h2>Recette boisson</h2>
    <ul>
        <?php the( 3 ) ?>
    </ul>
</body>
</html>