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
    <p>Montant: <?= $montant ?> €</p>

    <?php
        if( isset($_POST['boisson']) && isset($_POST['sucre']) ) {
            $message = $_POST['boisson'] . " en preparation";
            decrementStock($_POST['boisson'], $boissonsRecette);
            print var_dump($_SESSION["stockIngredient"]);
            print "<ul>".preparerBoisson($_POST['boisson'], $_POST['sucre'], $boissonsRecette)."</ul>";
        } else {
            $message = "choisissez votre boisson";
        } 
    ?>

    <p><?= print $message ?></p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <select name="boisson">
            <option selected disabled>Drink selection</option>
            <?= afficherBoissonSiIngredients($boissonsRecette, $boissonsRecette, $_SESSION["stockIngredient"]) ?>
        </select>
        <select name="sucre">
            <option selected disabled>Sugar selection</option>
            <?= afficherSucreSiSucre($stock); ?>  
        </select>
        <input type="submit" name="submit">
    </form>

</body>
</html>