<html>
    <head></head>
    <body>
        <?php
            $numero=$_REQUEST['numero'];
            $listaNum=array(1,2,3,5,6,3,2,6,2,4,6,2,4,6,9,8,4,2,6,7,8,5,2,6);
            $cont=0;
            for ($i=0; $i<sizeof($listaNum); $i++){
                if ($listaNum[$i]==$numero){
                    $cont++;
                }
            }
            if ($cont==0) {
                echo "No existe el número $numero en la lista";
            }
            else{
                echo "El número $numero aparece $cont veces";
            }
        ?>
    </body>
</html>