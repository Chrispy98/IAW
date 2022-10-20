<html>
    <meta charset="utf-8">
    <head></head>
    <body>
        <?php
            function sacaMiNum ($one, $two, $three, $maxmin){
                $res=$one;
                if ($maxmin=="maximo"){
                    if ($res<$two){
                        $res=$two;
                    }
                    if ($res<$three){
                        $res=$three;
                    }
                }
                else {
                    if ($res>$two){
                        $res=$two;
                    }
                    if ($res>$three){
                        $res=$three;
                    }
                    
                }
                return $res;
            }

            function muestra($res, $maxMin){
                echo "El $maxMin es $res";
            }
            $n1=$_REQUEST['n1'];
            $n2=$_REQUEST['n2'];
            $n3=$_REQUEST['n3'];
            $Mm=$_REQUEST['Mm'];
            muestra(sacaMiNum($n1,$n2,$n3,$Mm),$Mm);
        ?>
    </body>
</html>