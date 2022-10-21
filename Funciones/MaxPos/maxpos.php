<html>
    <meta charset="utf-8">
    <head></head>
    <body> 
        <?php
            $nums=array(rand(0,30),rand(0,30),rand(0,30),rand(0,30),rand(0,30));
            echo "Los números son el $nums[0], $nums[1], $nums[2], $nums[3] y el $nums[4]<br>";
            $posicion=0;
            function maxPosVector ($l, &$pos){
                $max=$l[0];
                for ($i=1; $i<sizeof($l); $i++){
                    if ($max<$l[$i]){
                        $max=$l[$i];
                        $pos=$i+1;
                    }
                }
                return $max;
            }
            
            $maximo=maxPosVector($nums,$posicion);
            echo "El máximo es $maximo y está en la $posicion.ª posición .";
        ?>
    </body>
</html>