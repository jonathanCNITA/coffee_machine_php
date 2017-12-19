<?php
    $message = "En attente ...";
    $heureLocale = date("H")+1;
    $today = date("d.m.y  \| $heureLocale:i");
    $montant = 0;

    $boissonsRecette = array(
        "expresso" => array( "café" => 1, "eau" => 1),
        "cafe_long" => array( "café" => 2, "eau" => 4),
        "the" => array( "thé" => 1, "eau" => 2)
    );

    function afficherBoisson( $boissons ) {
        foreach($boissons as $boisson => $value) {
            print "<option value=\"".$boisson."\">".$boisson."</option>";
        }
    }


    function preparerBoisson($boisson, $sucre, $recette) { 
        foreach($recette[$boisson] as $ingredient => $qty) {
            print "<li>".$qty." X ".$ingredient."</li>";
        }
        print "<li>".$sucre." X sucre(s)</li>";
    }
?>