<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$first=rand(0,50);
	$second=rand(0,50);
	$third=rand(0,50);
	echo "Los numeros son $first, $second y $third<br>";
	if ($first>=$second){
		if ($first>=$third){
			echo "El mayor es el $first";
		}
		else {
			echo "El mayor es el $third";
		}
	}
	else {
		if ($second>=$third){
			echo "El mayor es el $second";
		}
		else {
			echo "El mayor es else $third";
		}
	}
?>
</body>
</html>