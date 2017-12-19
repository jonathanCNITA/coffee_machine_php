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
    <?= afficherBoisson( $boissonsRecette ); ?>


    <!-- TEST recetteBoisson Refactoring -->
    <h2 class="testTitle">TEST preparerBoisson Refactoring</h2>

    <h3>Test preparerBoisson expresso + 1 sucre</h3>
    <?= preparerBoisson( "expresso", 1,  $boissonsRecette ) ?>

    <h3>Test preparerBoisson café long + 3 sucre</h3>
    <?= preparerBoisson( "cafe_long", 3, $boissonsRecette ) ?>

    <h3>Test preparerBoisson café long + 0 sucre</h3>
    <?= preparerBoisson( "the", 0, $boissonsRecette ) ?>

    <!-- TEST checkData -->
    <h2 class="testTitle">TEST checkData</h2>

    <h3>Test checkData test => false</h3>
    <?= checkData($_POST['boisson'], $_POST['sucre']) ?>

</body>
</html>