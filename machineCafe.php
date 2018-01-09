<?php
    include "fonctions.php";
?>

<?php
    $bdd = connectToDB('coffee_machine', 'root', '');

    // Get the drinks table
    $dbDrinks = $bdd->query('SELECT * FROM drinks');
    $myDrinks = $dbDrinks->fetchAll();
    // Create a sale
    $getDrinkCode = $bdd->prepare('SELECT code FROM drinks WHERE name = ?');
    $addCommand = $bdd->prepare("INSERT INTO sales (drinks_code, id, sugar, date) VALUES ( ?, NULL, ?, CURRENT_DATE)");

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
            print $_POST['boisson'];
            $message = $_POST['boisson'] . " en preparation";
            decrementStock($_POST['boisson'], $boissonsRecette);
            print var_dump($_SESSION["stockIngredient"]);
            print "<ul>".preparerBoisson($_POST['boisson'], $_POST['sucre'], $boissonsRecette)."</ul>";
            /*$userChoice = $getDrinkCode->execute(array($_POST['boisson']));
            $getDrinkCode->closeCursor();*/
            $addCommand->execute(array($userChoice, $_POST['sucre']));
            $addCommand->closeCursor();
        } else {
            $message = "choisissez votre boisson";
        } 
    ?>

    <p><?= print $message ?></p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <select name="boisson">
            <option selected disabled>Drink selection</option>
            <?= afficherListeBoisson($myDrinks) ?>
        </select>
        <select name="sucre">
            <option selected disabled>Sugar selection</option>
            <?= afficherSucreSiSucre($stock); ?>  
        </select>
        <input type="submit" name="submit">
    </form>
</body>
</html>