<html>
    <head></head>
    <body>
        <?php
            $tempe=array(20,30,24,42,5);
            $maximo=$tempe[0];
            for ($i=1; $i<sizeof($tempe); $i++){
                if ($maximo<$tempe[$i]){
                    $maximo=$tempe[$i];
                }
            }
            echo "El máximo es $maximo ºC.";
        ?>
    </body>
</html>