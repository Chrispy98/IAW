<!DOCTYPE html>
<html>
<head>
	<style>
		b {
			font-size: 800px;
			color: green;
		}

		span {
			color: red;
		}
		#no1 {
			font-size: 200px; 
		}
		#no2 {
			font-size: 100px; 
		}
		#no3 {
			font-size: 50px; 
		}
		#no4 {
			font-size: 25px; 
		}
		#no5 {
			font-size: 13px; 
		}
		#no6 {
			font-size: 7px; 
		}
		#no7 {
			font-size: 4px; 
		}
		#no8 {
			font-size: 2px; 
		}
		#no9 {
			font-size: 1px; 
		}
	</style>
</head>
<body>
<?php
	$first=rand(0,100);
	$second=rand(0,100);
	$third=rand(0,100);
	echo "Los numeros son $first, $second y $third<br>";
	$arrayNums=array($first,$second,$third);
	sort($arrayNums);
	if ($arrayNums[0]+$arrayNums[1]>$arrayNums[2]){
		echo "<b>SIUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUUU</b>";
	}
	else {
		echo "<span><span id=\"no1\">Nein</span><br><span id=\"no2\">Nein</span><br><span id=\"no3\">Nein</span><br><span id=\"no4\">Nein</span><br><span id=\"no5\">Nein</span><br><span id=\"no6\">Nein</span><br><span id=\"no7\">Nein</span><br><span id=\"no8\">Nein</span><br><span id=\"no9\">Nein</span></span>";
	}

?>
</body>
</html>