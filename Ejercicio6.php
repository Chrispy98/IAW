<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$first=1;
$result=0;
while ($first<6){
	$second=0;
	echo "<b>Tabla del $first</b><br>";
	while ($second<11){
		$result=$first*$second;
		echo "$first*$second=$result<br>";
		$second++;
	}
	echo "<br>---------------------------------------------------<br>";
	$first++;
}
?>
</body>
</html>