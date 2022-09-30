<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php  
		$nombre=$_REQUEST['nombre'];
		$peso=$_REQUEST['peso'];
		$altura=$_REQUEST['altura'];
		$imx=$_REQUEST['imx'];
		$res=0;
		if ($imx=="imc"){
			$res=$peso*10000/($altura*$altura);
		}
		else {
			$res=($altura*$altura)/($peso*10000);
		}
		echo "Hola, $nombre. Tu $imx es $res.";
	?>
</body>
</html>