<html>
    <meta charset="utf-8">
    <head></head>
    <body>
        <?php
            function calculaIMC($kg, $cm){
                $res=$kg*10000/($cm*$cm);
                return $res;
            }

            function mostrarIMC($imc){
                echo "El IMC es de $imc <br><br>";
                if ($imc<20){
                    echo "<img src=\"https://www.bunzlspain.com/media/catalog/product/cache/9c6b29a2c776d95861bfe4658566c6a4/2/4/24306-1_2.jpg\">";
                }
                elseif ($imc>25) {
                    echo "<img src=\"https://www.lacasadelasgolosinas.com/6712-thickbox_default/phoskitos-18-unidades.jpg\">";
                }
                else {
                    echo "Madre mía eres feísimo<br>";
                    echo "<img src=\"https://st2.depositphotos.com/3489481/5208/i/950/depositphotos_52085891-stock-photo-man-laughing-pointing-finger-at.jpg\">";
                }
            }

            $peso=$_REQUEST['peso'];
            $altura=$_REQUEST['altura'];
            mostrarIMC(calculaIMC($peso,$altura));
        ?>
    </body>
</html>