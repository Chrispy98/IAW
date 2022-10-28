<html>
    <meta charset="utf-8">  
    <head>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <!-- Con estas tres instrucciones se fuerza a no usar la caché y no tener problemas con 
        las variables inicializadas. Esto no es muy recomendable en ciertos casos.-->
        <script>
            if (window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </head>
    <body>
        <form action="" method="post">
            NIF: <input type="number" name="numero"><br><br>
            <input type="submit" name="pintar" value="Pinta">
            <input type="submit" name="edad" value="¿Mayor de edad?"><br><br>
        </form>
        <?php
            if (isset($_REQUEST['pintar'])){
                for ($i=0; $i<$_REQUEST['numero']; $i++){
                    for ($j=0; $j<$_REQUEST['numero']; $j++){
                        echo "*";
                    }
                    echo "<br>";
                }
            }

            if (isset($_REQUEST['edad'])){
                if ($_REQUEST['numero']<18){
                    echo "Eres menor de edad";
                }
                else {
                    echo "Eres mayor de edad";
                }
            }
        ?>
    </body>
</html>