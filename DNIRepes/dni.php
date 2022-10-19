<html>
    <meta charset="utf-8";
    <head></head>
    <body>
        <?php
            $dni1=$_REQUEST['dni1'];
            $dni2=$_REQUEST['dni2'];
            $dni3=$_REQUEST['dni3'];
            $dni4=$_REQUEST['dni4'];
            $listaDNI[$dni1]=$_REQUEST['nombre1'];
            $listaDNI[$dni2]=$_REQUEST['nombre2'];
            $listaDNI[$dni3]=$_REQUEST['nombre3'];
            $listaDNI[$dni4]=$_REQUEST['nombre4'];
            $dniABuscar=$_REQUEST['dniABuscar'];
            $copiota="";
            $serepite=0;
            foreach ($listaDNI AS $dni => $nombre){ 
                if ($dni==$dniABuscar){
                    $copiota=$nombre;
                    $serepite++;
                    break;
                }
            }
            if ($serepite>0){
                echo "Sí existe el DNI y su nombre es $copiota";
            }
            else {
                echo "No se encuentra DNI";
            }
        ?>
    </body>
</html>