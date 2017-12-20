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

    $stockIngredient = array(
        "café" => 10,
        "thé" => 10,
        "sucre" => 10,
        "eau" => false
    );


    function boissonDisponible($boisson, $recette, $stock) {
        foreach($recette[$boisson] as $ingredient => $qty) {
            print $ingredient . " " . $qty . " | ";
            if ($stock[$ingredient] - $qty < 0) {
                print "boisson non disponibe";
                return false;
            }
            print $stock[$ingredient]. " <> ";
        }
        print "boisson disponibe";
        return true;
    }


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

    function checkData($dataBoisson, $dataSucre) {
        if( isset($dataBoisson) && isset($dataSucre) ) {
            //print "Datas here";
            return true;
        }
        //print "No datas here";
        return false;
    }
?>