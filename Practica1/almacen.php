<html>
    <meta charset="utf-8">
    <head>
        <title>Almacén · Floristería</title>
        <link rel="stylesheet" href="floristeria.css">
        <!--<h1>Almacén</h1> -->
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
            if (isset($_REQUEST['alta'])){
                $boton=0;
            } else if (isset($_REQUEST['baja'])){
                $boton=1;
            } else if (isset($_REQUEST['consultar'])){
                $boton=2;
            }
            
    ?>
    <body>
        <div id="links">
            <div class="links"><a href="principal.php"><img id="homePic" src="pics/home-page.png"></a></div>
            <div id="almacen" class="links"><a href="almacen.php">ALMACÉN</a></div>
            <div class="links"><a href="clientes.php">CLIENTES</a></div>
            <div class="links"><a href="compras.php">COMPRAS</a></div>
        </div><br><br>
        <form action="" method="post">
            <div id="datos">
            IDFlor: <input type="number" name="idflor"><br><br>
            Precio: <input type="number" name="precio"><br><br>
            Cantidad: <input type="number" name="cantidad"><br><br></div>
            <div id="botones"><input type="submit" name="alta" value="Alta">
            <input type="submit" name="baja" value="Baja">
            <input type="submit" name="consultar" value="Consultar productos"></div>
        </form><br>
        <?php
            include 'funcionesFloristeria.php';
            if (isset($boton)){
                if ($boton==0){
                    if (isset($_REQUEST['idflor']) && $_REQUEST['idflor']!="" 
                    && isset($_REQUEST['precio']) && $_REQUEST['precio']!="" 
                    && isset($_REQUEST['cantidad']) && $_REQUEST['cantidad']!=""){
                        if (!florExists($_REQUEST['idflor'])){
                            $conexion=mysqli_connect("localhost","root","","practica")
                                or die("Problemas de conexión");
                            $insert="INSERT INTO flores VALUES ($_REQUEST[idflor],$_REQUEST[precio],$_REQUEST[cantidad]);";
                            mysqli_query($conexion,$insert) 
                                or die("Problemas en el insert: ".mysqli_error($conexion));
                            mysqli_close($conexion);
                            echo "<p id=\"message\">Las flores han sido dadas de alta</p>";
                        }
                        else {
                            echo "<p id=\"message\">Error: La flor con ID ".$_REQUEST['idflor']." ya estaba registrada.</p>";
                        }
                    }
                    else {
                        echo "<p id=\"message\">Tienes que completar todos los campos</p>";
                    }
                } else if ($boton==1){
                    if (isset($_REQUEST['idflor']) && $_REQUEST['idflor']!=""){
                        if (florExists($_REQUEST['idflor'])){
                            if (florNoComprada($_REQUEST['idflor'])){
                                $conexion=mysqli_connect("localhost","root","","practica")
                                    or die("Problemas de conexión");
                                $delete="DELETE FROM flores WHERE idflor=$_REQUEST[idflor];";
                                mysqli_query($conexion,$delete) 
                                    or die("Problemas en el delete: ".mysqli_error($conexion));
                                mysqli_close($conexion);
                                echo "<p id=\"message\">Se ha borrado la flor con ID ".$_REQUEST['idflor']."</p>";
                            }
                            else {
                                echo "<p id=\"message\">Error: No se puede dar de baja a la flor con id ".$_REQUEST['idflor']." porque ya se ha realizado una compra de esta.</p>";
                            }
                        }
                        else {
                            echo "<p id=\"message\">No existe la flor con ID ".$_REQUEST['idflor']."</p>";
                        }
                    }
                    else {
                        echo "<p id=\"message\">Tienes que indicar el ID de la flor.</p>";
                    }
                } else if ($boton==2) {
                    $conexion=mysqli_connect("localhost","root","","practica")
                        or die("Problemas de conexión");
                    $select="SELECT idflor, precio, cantidad FROM flores;";
                    $filas=mysqli_query($conexion,$select) 
                        or die("Problemas en el select: ".mysqli_error($conexion));
                    echo "<table id=\"tAlmacen\"><tr><th>IDCompra</th><th>Precio</th><th>Cantidad</th></tr>";
                    if ($filas) {
                        $fila=mysqli_fetch_array($filas);
                        while ($fila) {
                            echo "<tr><td>".$fila['idflor']."</td><td>".$fila['precio']."</td><td>".$fila['cantidad']."</td></tr>";
                            $fila=mysqli_fetch_array($filas);
                        }
                    }
                    mysqli_close($conexion);
                    echo "</table>";
                }
            }
        ?>
    </body>
</html>