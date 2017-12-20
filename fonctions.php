<?php

    session_start();

    $message = "En attente ...";
    $heureLocale = date("H")+1;
    $today = date("d.m.y  \| $heureLocale:i");
    $montant = 0;


    $boissonsRecette = array(
        "thé" => array( "thé" => 1, "eau" => 2),
        "expresso" => array( "café" => 1, "eau" => 1),
        "cafe_long" => array( "café" => 2, "eau" => 4),
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
        $options = "";
        do {
            $options .= "<option value=\"".$nbSugars."\">".$nbSugars."</option>";
            $nbSugars++;
        } while($nbSugars < 4 && $nbSugars < $sugarStock + 1);
        return $options;
    }


    function preparerBoisson($boisson, $sucre, $recette) {
        $ingredientList = "";
        foreach($recette[$boisson] as $ingredient => $qty) {
            $ingredientList .= "<li>".$qty." * ".$ingredient."</li>";
        }
        $ingredientList .= "<li>".$sucre." * sucre(s)</li>";
        return $ingredientList;
    }


    function decrementStock($boisson, $recette) {
        foreach($recette[$boisson] as  $ingredient => $qty) {
            $_SESSION["stockIngredient"][$ingredient] -= $qty;
        }
        $_SESSION["stockIngredient"]["sucre"] -= $_POST['sucre'];
    }

    function getOutOfStock($stock) {
        // return true if stoks are == 0
    }
?>