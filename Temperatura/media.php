<html>
    <head></head>
    <body>
        <?php
            $tempe=array(20,30,24,42,5);
            $total=0;
            $media=0;
            for ($i=0; $i<sizeof($tempe); $i++){
                $total+=$tempe[$i];
            }
            $media=$total/sizeof($tempe);
            echo "La media es $media ºC";
        ?>
    </body>
</html>