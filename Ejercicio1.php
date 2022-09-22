<!DOCTYPE html>
<html>
<head>
	<style>
		#rojito {
			color: red;
		}
		body {
			font-size: 60px;
		}
	</style>
</head>
<body>
<?php
	echo "<p id=\"rojito\">Hola</p>";
	echo "<br>";
	$dia=date("d");
	$mes=date("m");
	echo "Hoy es $dia de $mes";
	echo "<br>";
	if ($dia>20)
		echo "TE QUEDA POCO PARA COBRAR <br><br><img src=\"https://c.tenor.com/fDQWfGEPpxAAAAAM/lets-get-it-dance.gif\">";	
	else
		echo "<p id=\"rojito\">AHORRA!</p> <img src=\"https://static.carrefour.es/hd_100x_/imagenes/products/87112/95867/163/8711295867163/imagenGrande1.jpg\""
	
?>
</body>
</html>