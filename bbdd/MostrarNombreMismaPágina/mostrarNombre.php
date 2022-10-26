<html>
    <meta charset="utf-8">
    <head>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <!-- Con estas tres instrucciones se fuerza a no usar la caché y no tener problemas con 
        las variables inicializadas. Esto no es muy recomendable en ciertos casos.-->
    </head>
    <?php
        if (isset($_REQUEST['enviar'])) {
            $nombre=$_REQUEST['nombre'];
        }
    ?>
    <body>
        <form action="" method="post">
            Tu nombre: <input type="text" name="nombre"><br><br>
            <input type="submit" value="Muestra" name="enviar">
        </form>
        <?php
            if (isset($nombre)){
                echo $nombre;
            }
        ?>
    </body>
</html>