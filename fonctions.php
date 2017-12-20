<?php
    $message = "En attente ...";
    $heureLocale = date("H")+1;
    $today = date("d.m.y  \| $heureLocale:i");
    $montant = 0;


    $boissonsRecette = array(
        "expresso" => array( "café" => 1, "eau" => 1),
        "cafe_long" => array( "café" => 2, "eau" => 4),
        "thé" => array( "thé" => 1, "eau" => 2)
    );


    $stockIngredient = array(
        "eau" => 10,
        "thé" => 0,
        "café" => 10,
        "sucre" => 10,
    );


    function boissonDisponible($boisson, $recette, $stock) {
        $isDispo = true;
        foreach($recette[$boisson] as $ingredient => $qty) {
            if ($stock[$ingredient] - $qty < 0) {
                $isDispo = false;
            }
        }
        return $isDispo;
    }


    function afficherBoisson( $boissons ) {
        foreach($boissons as $boisson => $value) {
            print "<option value=\"".$boisson."\">".$boisson."</option>"; 
        }
    }


    function afficherBoissonSiIngredients( $boissons, $recette, $stock ) {
        $listeBoisson = "";
        foreach($boissons as $boisson => $value) {
            if ( boissonDisponible($boisson, $recette, $stock) ){
                $listeBoisson .= "<option value=\"".$boisson."\">".$boisson."</option>";
            }
        }
        return $listeBoisson;
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