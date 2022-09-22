<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			position: absolute;
			top: 10%;
			left: 30%;
			font-size: 80px;
		}
		#dinero {
			top: 27%;
			left: 45%;
			font-size: 120px;
			color: green;
		}
		#impuestos {
			top: 45%;
			left: 50%;
			font-size: 10px;
		}
	</style>
</head>
<body>
<?php
	$loteria=rand(1,100);
	echo "Has sacado el $loteria <br>";
	if ($loteria<=25){
		$impuesto=1000*0.81+$loteria;
		echo "HAS GANADO <p id=\"dinero\">1000€</p><br><p id=\"impuestos\">Cobras $impuesto tras impuestos.</p>";
	}
	elseif ($loteria<=75) {
		$impuesto=2000*0.7+$loteria;
		echo "HAS GANADO <p id=\"dinero\">2000€</p><br><p id=\"impuestos\">Cobras $impuesto tras impuestos.</p>";
	}
	else {
		$impuesto=3000*0.63+$loteria;
		echo "HAS GANADO <p id=\"dinero\">3000€</p><br><p id=\"impuestos\">Cobras $impuesto tras impuestos.</p>";
	}
?>
</body>
</html>