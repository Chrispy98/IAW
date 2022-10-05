<html>
    <head>
    </head>
    <body>
        <?php
            $edad=$_REQUEST['edad'];
            $importe=$_REQUEST['importe'];
            $iva=$_REQUEST['iva'];
            if ($edad<18){
                echo "Eres menor de edad y el importe es ";
            }
            else {
                echo "Eres mayor de edad y el importe es ";
            }
            $importe*=$iva;
            if (isset($_REQUEST['special'])){
                $importe+=$_REQUEST['special'];
            }
            echo "$importe";
        ?>
    </body>
</html>