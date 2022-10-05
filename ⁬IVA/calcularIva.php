<html>
    <head>
    </head>
    <body>
        <?php
            $edad=$_REQUEST['edad'];
            $importe=$_REQUEST['importe'];
            $iva=$_REQUEST['iva'];
            if ($edad<18){
                echo "Eres menor de edad ";
            }
            else {
                echo "Eres mayor de edad ";
            }
            $importe*=$iva;
            if (isset($_REQUEST['special'])){
                $importe+=$_REQUEST['special'];
            }
            echo "y el importe es $importe.";
        ?>
    </body>
</html>