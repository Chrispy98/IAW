<html>
<head>
	<style>
		#hola {
			color: red;
			font-size: 140px;
		}
		#nombre {
			background-color: black;
			color: white;
			font-size: 170px;
			font-family: helvetica;
		}
		#general {
			color: green;
			font-size: 120px;
		}
	</style>
</head>
<body>
<span id="general">
<?php
  echo "<b id=\"hola\">\"Hola Mundo\"</b>";
  echo "<br>";
  echo "<i>Soy <u id=\"nombre\">Christian</u></i>";
  echo "<br>";
  $segundo=date("s");
  echo $segundo;
  echo "<br>";
  if ($segundo<30)
  	echo "<p>Primera mitad</p>";
  else
  	echo "<p>Segunda mitad</p>";
?>
</span>
</body>
</html>