<?php
	$listeBoissons = array("expresso", " café long", "thé");
	$message = "En attente ...";
	$today = date("d.m.y");
	$montant = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Coffee machine in php</title>
</head>
<body>
	<?php
		echo "<h1>Coffee machine</h1>";
		echo "<h3>Date du jour : ".$today."</h3>";
		foreach ($listeBoissons as $key) {
		 	echo "<h2>".$key."</h2>";
		}
		echo "<p>".$message."</p>";
		echo "<p>Montant : ".$montant." €</p>";
	?>
</body>
</html>