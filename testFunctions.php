<?php
	include 'fonctions.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Coffee machine functions test file</title>
    <style type="text/css">
    	.testTitle {
    		background-color: yellow;
    	}
    </style>
</head>
<body>

    <!-- TEST associative array -->
    <h2 class="testTitle">TEST associative array</h2>
    
    <?php
        foreach($stockIngredient as  $k => $v) {
            echo $k."  ";
            echo $v." / ";
        }
    ?>




    <!-- TEST associative array in an associative array -->
    <h2 class="testTitle">TEST associative array in an associative array</h2>
    
    <?php
        foreach($boissonsRecette as  $k => $v) {
            foreach($v as $w => $z){
                echo $w." / ";
            }
        }
    ?>




	<!-- TEST afficherBoisson -->
    <h2 class="testTitle">Test afficherBoisson</h2>
    <?= afficherBoisson( $boissonsRecette ); ?>


    <!-- TEST recetteBoisson Refactoring -->
    <h2 class="testTitle">TEST preparerBoisson Refactoring</h2>

    <h3>Test preparerBoisson expresso + 1 sucre</h3>
    <?= preparerBoisson( "expresso", 1,  $boissonsRecette ) ?>

    <h3>Test preparerBoisson café long + 3 sucre</h3>
    <?= preparerBoisson( "cafe_long", 3, $boissonsRecette ) ?>

    <h3>Test preparerBoisson thé + 0 sucre</h3>
    <?= preparerBoisson( "thé", 0, $boissonsRecette ) ?>

    <!-- TEST checkData -->
    <h2 class="testTitle">TEST checkData</h2>

    <h3>Test checkData test => false</h3>
    <?= checkData($_POST['boisson'], $_POST['sucre']) ?>


    <!-- TEST boissonDisponible($boisson, $recette, $stock) -->
    <h2 class="testTitle">TEST boissonDisponible($boisson, $recette, $stock) - expresso</h2>
    <?php print boissonDisponible("expresso", $boissonsRecette, $stockIngredient) ?>

    <h2 class="testTitle">TEST boissonDisponible($boisson, $recette, $stock) - cafe_long</h2>
    <?php print boissonDisponible("cafe_long", $boissonsRecette, $stockIngredient) ?>

    <h2 class="testTitle">TEST boissonDisponible($boisson, $recette, $stock) - thé</h2>
    <?php print boissonDisponible("thé", $boissonsRecette, $stockIngredient) ?>


</body>
</html>