<html>
    <head></head>
    <body>
        <?php
            $tempe=array(20,30,24,42,5);
            for ($i=0; $i<sizeof($tempe); $i++){
                for ($j=0; $j<sizeof($tempe)-$i-1; $j++){
                    if ($tempe[$j+1]>$tempe[$j]){
                        $aux=0;
                        $aux=$tempe[$j];
                        $tempe[$j]=$tempe[$j+1];
                        $tempe[$j+1]=$aux;
                    }
                }
            }
            echo "El máximo es $tempe[0] ºC.";
        ?>
    </body>
</html>