<?php
	$listeBoissons = array("expresso", " café long", "thé");
	$message = "En attente ...";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Coffee machine in php</title>
</head>
<body>
	<?php
		echo "<h1>Coffee machine</h1>";
		foreach ($listeBoissons as $key) {
		 	echo "<h2>".$key."</h2>";
		}
		echo "<p>".$message."</p>";
	?>
</body>
</html>