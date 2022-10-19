<html>
    <head></head>
    <body>
        <?php
            //$numeros=array();
            $cantidad=$_REQUEST['cantidad'];
            $operacion=$_REQUEST['operacion'];
            $resultado=0;
            for ($i=1; $i<$cantidad+1; $i++){       
                $numeros[$i-1]=$_REQUEST['n'.$i];
            }
            echo "El resultado de la ";

            if ($operacion=="suma"){
                echo "suma es: ";
                for ($i=0; $i<sizeof($numeros); $i++){
                    $resultado+=$numeros[$i];
                }
            }
            else {
                $resultado=1;
                echo "multiplicación es: ";
                for ($i=0; $i<sizeof($numeros); $i++){
                    $resultado*=$numeros[$i];
                }
            }
            echo $resultado;
        ?>
    </body>
</html>