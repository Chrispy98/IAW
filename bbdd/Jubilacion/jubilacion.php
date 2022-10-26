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
    <?php
        if (isset($_REQUEST['anios'])){
            $mensaje="Tienes ".$_REQUEST['edad']." años";
        }
        else if (isset($_REQUEST['jubilacion'])){
            $quedan=67-$_REQUEST['edad'];
            $mensaje="Te quedan ".$quedan." años para jubilarte";
        }
    ?>
    <body>
        <form action="" method="post">
            Edad: <input type="number" name="edad"><br><br>
            <input type="submit" name="anios" value="Tu edad">
            <input type="submit" name="jubilacion" value="Cuánto te queda para jubilarme">
        </form> 
        <?php
            if (isset($_REQUEST['edad']) && $_REQUEST['edad']!=""){
                echo $mensaje;
            }
        ?>
    </body>
</html>
