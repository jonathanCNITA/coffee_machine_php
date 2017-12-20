<?php

    session_start();

    $message = "En attente ...";
    $heureLocale = date("H")+1;
    $today = date("d.m.y  \| $heureLocale:i");
    $montant = 0;


    $boissonsRecette = array(
        "expresso" => array( "café" => 1, "eau" => 1),
        "cafe_long" => array( "café" => 2, "eau" => 4),
        "thé" => array( "thé" => 1, "eau" => 2)
    );


    if( empty($_SESSION["stockIngredient"]) ) {
        $_SESSION["stockIngredient"] = array(
        "eau" => 100,
        "thé" => 2,
        "café" => 2,
        "sucre" => 2,
        );
    }


    function boissonDisponible($boisson, $recette, $stock) {
        $isDispo = true;
        foreach($recette[$boisson] as $ingredient => $qty) {
            if ($stock[$ingredient] - $qty < 0) {
                $isDispo = false;
            }
        }
        return $isDispo;
    }

    // Unused function ready to be deleted
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

    function afficherSucreSiSucre($stock) {
        $sugarStock = $_SESSION["stockIngredient"]['sucre'];
        $nbSugars = 0;
        do {
            print "<option value=\"".$nbSugars."\">".$nbSugars."</option>";
            $nbSugars++;
        } while($nbSugars < 4 && $nbSugars < $sugarStock + 1);
    }


    function preparerBoisson($boisson, $sucre, $recette) { 
        foreach($recette[$boisson] as $ingredient => $qty) {
            print "<li>".$qty." * ".$ingredient."</li>";
        }
        print "<li>".$sucre." * sucre(s)</li>";
    }


    function decrementStock($boisson, $recette) {
        foreach($recette[$boisson] as  $ingredient => $qty) {
            $_SESSION["stockIngredient"][$ingredient] -= $qty;
        }
        $_SESSION["stockIngredient"]["sucre"] -= $_POST['sucre'];
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