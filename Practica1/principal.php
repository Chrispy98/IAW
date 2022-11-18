<html>
    <meta charset="utf-8">
    <head>
        <title>Página principal · Floristería</title>
        <link rel="stylesheet" href="floristeria.css">
        <!--<h1 id="principal">Página principal</h1>-->
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
    <body id="bodPrinc">
        <div id="links">
            <div id="home" class="links"><a href="principal.php"><img id="homePic" src="pics/home-page.png"></a></div>
            <div class="links"><a href="almacen.php">ALMACÉN</a></div>
            <div class="links"><a href="clientes.php">CLIENTES</a></div>
            <div class="links"><a href="compras.php">COMPRAS</a></div>
        </div>   
        <br>
        <br>
        <p id="welcome"> Bienvenido a la floristería de Christian</p> 
    </body>
</html>