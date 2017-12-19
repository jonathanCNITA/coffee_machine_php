<?php
    $listeBoissons = array("expresso", "cafe_long", "the");
    $message = "En attente ...";
    $heureLocale = date("H")+1;
    $today = date("d.m.y  \| $heureLocale:i");
    $montant = 0;


    function afficherBoisson( $boissons ) {
        foreach($boissons as $boisson) {
            //print "<button>$boisson</button>";
            print "<option value=\"".$boisson."\">".$boisson."</option>";
        }
    }


    function preparerExpresso( $nbSucres ) {
        $recette = array("café", "eau", $nbSucres." sucre(s)");
        foreach($recette as $ingredient) {
            print "<li>".$ingredient."</li>";
        }
    }


    function preparerCafeLong( $nbSucres ) {
        $recette = array("2 * café", "2 * eau", $nbSucres." sucre(s)");
        foreach($recette as $ingredient) {
            print "<li>".$ingredient."</li>";
        }
    }


    function preparerThe( $nbSucres ) {
        $recette = array("1 * thé", "2 * eau", $nbSucres." sucre(s)");
        foreach($recette as $ingredient) {
            print "<li>".$ingredient."</li>";
        }
    }


    function preparerBoisson( $boisson, $sucre) {
        if ($boisson == "expresso") {
            preparerExpresso($sucre);
        } else if ($boisson == "cafe_long") {
            preparerCafeLong($sucre);
        } else if ($boisson == "the") {
            preparerThe($sucre);
        }
    }
?>