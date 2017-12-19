<?php
    include "fonctions.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prepare boisson</title>
</head>
<body>
    <h1>Prepare boisson</h1>
    <h1>
		Boisson : <?php echo $_POST["boisson"]; ?><br>
		Nb sucres: <?php echo $_POST["sucre"]; ?>
	</h1>
    <ul>
        <?php preparerBoisson($_POST["boisson"], $_POST["sucre"]) ?>
    </ul>
</body>
</html>