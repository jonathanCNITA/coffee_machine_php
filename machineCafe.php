<?php
    include "fonctions.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Coffee machine in php</title>
</head>
<body>
    <h1>Coffee machine</h1>
    <p>Date du jour : <?= $today ?></p>
    <p><?= $message ?></p>
    <p>Montant: <?= $montant ?> €</p>

    

    <form action="preparerBoisson.php" method="post">
        <select name="boisson">
            <option selected disabled>Drink selection</option>
            <?= afficherBoisson($listeBoissons) ?>
        </select>
        <select name="sucre">
            <option selected disabled>Sugar selection</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <input type="submit">
    </form>

</body>
</html>