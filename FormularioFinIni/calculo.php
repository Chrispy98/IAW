<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	$inicio=$_REQUEST['inicio'];
	$fin=$_REQUEST['fin'];
	if ($fin<$inicio){
		echo "ERROR!!!";
	}
	else {
		for ($i=$inicio; $i<$fin+1; $i++){
			echo "$i<br>";
		}
	}
?>
</body>
</html>