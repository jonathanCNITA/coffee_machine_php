<?php

    $message = "En attente ...";
    $heureLocale = date("H")+1;
    $today = date("d.m.y  \| $heureLocale:i");
    $montant = 0;
    $affichageDeLaRecette = "";


    function afficherListeBoisson( $boissons ) {
        $listeBoissons = "";
        foreach($boissons as $boisson) {
                $listeBoissons .= "<option value=\"".$boisson['name']."\">".$boisson['name']."</option>";
        }
        return $listeBoissons;
    }


    function afficherSucreSiSucre($data) {
        $sugarStock = $data->query("SELECT quantity FROM ingredients WHERE ingredients.id = 6;");
        $sugarQuantityGood = $sugarStock->fetch()['quantity'];
        print ($sugarQuantityGood);
        $nbSugars = 0;
        $options = "";
        do {
            $options .= "<option value=\"".$nbSugars."\">".$nbSugars."</option>";
            $nbSugars++;
        } while($nbSugars < 4 && $nbSugars < $sugarQuantityGood + 1);
        return $options;
    }

    
    function afficherRecette($recette, $sugars) {
        $ingredientList = "<h3>RECETTE:</h3><ul>";
        foreach($recette as $ingredient) {
            $ingredientList .= "<li>".$ingredient['recipeqty']." * ".$ingredient['name']."</li>";
        }
        $ingredientList .= "<li>". $sugars ." * sucre(s)</li></ul>";
        return $ingredientList;
    }


    function makeAnOrder($data, $codeBoisson, $sucres) {
        $addCommand = $data->prepare("INSERT INTO sales (drinks_code, id, sugar, date) VALUES ( ?, NULL, ?, NOW());");
        $addCommand->execute(array($codeBoisson, $sucres));
        $addCommand->closeCursor();
    }


    function decrementStock($data, $drinkRecipe, $sugar) {
        $decrementIngredients = $data->prepare('UPDATE ingredients SET quantity = quantity - ? WHERE ingredients.id = ? ;');
        
        foreach($drinkRecipe as $ing) {
            $decrementIngredients->execute(array($ing['recipeqty'], $ing['ingredients_id']));
        }
        if($sugar > 0) {
            $decrementIngredients->execute(array($sugar, 6));
        }
        $decrementIngredients->closeCursor();
    }


    function theRecipe($data, $codeboisson) {
        $getRecipe = $data->prepare("SELECT name, recipeqty, ingredients_id FROM recipes INNER JOIN ingredients ON recipes.ingredients_id=ingredients.id WHERE drinks_code = ?;");
        $getRecipe->execute(array($codeboisson));
        $theRecipe = $getRecipe->fetchAll();
        $getRecipe->closeCursor();
        return $theRecipe;
    }


    function connectToDB($dbName, $userName, $mdp) {
        try {
            $db = new PDO('mysql:host=localhost;dbname='.$dbName.';charset=utf8', $userName, $mdp);
        } catch(Exeption $e) {
            die('Error: '. $e->getMessage());
        }
        return $db;
    }
    
?>