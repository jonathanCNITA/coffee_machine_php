<?php
    include "fonctions.php";
    require_once "config.inc.php";
?>

<?php
    $bdd = connectToDB($dbas, $user, $pass);

    // SQL Get the drinks table
    $dbDrinks = $bdd->query('SELECT * FROM drinks');
    $myDrinks = $dbDrinks->fetchAll();
    // make an array with all the data from drinks table
    $allDrinksData = array();
    foreach($myDrinks as $drink) {
        $allDrinksData[$drink['name']] = array('code'=> $drink['code'], 'price' => $drink['price']); 
    }
    
    if( isset($_POST['boisson']) && isset($_POST['sucre']) ) {
        if($_POST['boisson'] != "" || $_POST['boisson'] != "" ) {
            $message = $_POST['boisson'] . " en preparation";
            $montant = $allDrinksData[ $_POST['boisson'] ]['price'];
            $codeUserDrink = $allDrinksData[ $_POST['boisson'] ]['code'];
            
            makeAnOrder($bdd, $codeUserDrink, $_POST['sucre']);
            
            $recipe = theRecipe($bdd, $codeUserDrink);
            decrementStock($bdd, $recipe, $_POST['sucre']);
            $affichageDeLaRecette = afficherRecette($recipe, $_POST['sucre']);
        }
    } else {
        $message = "choisissez votre boisson";
    }

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

    <p><?=  $message ?></p>
    <div><?= $affichageDeLaRecette ?><div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <select name="boisson">
            <option selected disabled>Drink selection</option>
            <?= afficherListeBoisson($myDrinks) ?>
        </select>
        <select name="sucre">
            <option selected disabled>Sugar selection</option>
            <?= afficherSucreSiSucre($bdd); ?>  
        </select>
        <input type="submit" name="submit">
    </form>
</body>
</html>