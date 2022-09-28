<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$contFor=10;
echo "Con for: ";
for ($i=0; $i<=30 && $contFor>0; $i++){
	if ($i%2==0){
		echo "$i, ";
		$contFor--;
	}
}
echo "<br>Ahora con while: ";
$contWhile=10;
$i=0;
while ($contWhile>0){
	if ($i%2==0){
		echo "$i, ";
		$contWhile--;
	}
	$i++;
} 
?>
</body>
</html>