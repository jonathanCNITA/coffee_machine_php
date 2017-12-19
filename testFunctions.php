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

	<!-- TEST afficherBoisson -->
    <h2 class="testTitle">Test afficherBoisson</h2>
    <?= afficherBoisson( $listeBoissons ); ?>


    <!-- TEST preparerExpresso -->
    <h2 class="testTitle">TEST preparerExpresso</h2>

    <h3>Test preparerExpresso + 0 sucre</h3>
    <?= preparerExpresso( 0 ) ?>

    <h3>Test preparerExpresso + 1 sucre</h3>
    <?= preparerExpresso( 1 ) ?>

    <h3>Test preparerExpresso + 3 sucres</h3>
    <?= preparerExpresso( 3 ) ?>


    <!-- TEST preparerCafeLong -->
    <h2 class="testTitle">TEST preparerCafeLong</h2>

    <h3>Test preparerCafeLong + 0 sucre</h3>
    <?= preparerCafeLong( 0 ) ?>

     <h3>Test preparerCafeLong + 1 sucre</h3>
    <?= preparerCafeLong( 1 ) ?>

    <h3>Test preparerCafeLong + 3 sucres</h3>
    <?= preparerCafeLong( 3 ) ?>


    <!-- TEST preparerThe -->
    <h2 class="testTitle">TEST preparerThe</h2>

    <h3>Test preparerThe + 0 sucre</h3>
    <?= preparerThe( 0 ) ?>

    <h3>Test preparerThe + 1 sucre</h3>
    <?= preparerThe( 1 ) ?>

    <h3>Test preparerThe + 3 sucres</h3>
    <?= preparerThe( 3 ) ?>

    <!-- TEST recetteBoisson -->
    <h2 class="testTitle">TEST recetteBoisson</h2>

    <h3>Test recetteBoisson expresso + 1 sucre</h3>
    <?= preparerBoisson( "expresso", 1 ) ?>

    <h3>Test recetteBoisson café long + 3 sucre</h3>
    <?= preparerBoisson( "cafe long", 3 ) ?>

    <h3>Test recetteBoisson café long + 0 sucre</h3>
    <?= preparerBoisson( "the", 0 ) ?>


</body>
</html>