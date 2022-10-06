<html>
    <head></head>
    <body>
        <?php
            $altura=$_REQUEST['altura'];
            $forma=$_REQUEST['forma'];
            $sentido=$_REQUEST['sentido'];
            if ($sentido=="normal"){
                for ($i=0; $i<$altura+1; $i++){
                    $count=$i;
                    while ($count>0){
                        echo "$forma";
                        $count--;
                    }
                    echo "<br>";
                }
            }
            else {
                for ($i=$altura; $i>=0; $i--){
                    $count=$i;
                    while ($count>0){
                        echo "$forma";
                        $count--;
                    }
                    echo "<br>";
                }
            }
        ?>
    </body>
</html>