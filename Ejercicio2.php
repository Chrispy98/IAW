<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			font-size: 120px;
		}
		#dinero {
			font-size: 240px;
			color: green;
		}
	</style>
</head>
<body>
<?php
	$loteria=rand(1,100);
	echo "Has sacado el: $loteria <br>";
	if ($loteria<=25){
		echo "HAS GANADO <p id=\"dinero\">1000€</p>";
	}
	elseif ($loteria<=75) {
		echo "HAS GANADO <p id=\"dinero\">2000€</p>";
	}
	else {
		echo "HAS GANADO <p id=\"dinero\">3000€</p>";
	}
?>
</body>
</html>