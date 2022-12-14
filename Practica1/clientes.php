<html>
    <meta charset="utf-8">
    <head>
        <title>Clientes · Floristería</title>
        <link rel="stylesheet" href="floristeria.css">
         <!--<h1>Clientes</h1>-->
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
            <div class="links"><a href="almacen.php">ALMACÉN</a></div>
            <div id="clientes" class="links"><a href="clientes.php">CLIENTES</a></div>
            <div class="links"><a href="compras.php">COMPRAS</a></div>
        </div><br><br>
        <form action="" method="post">
            <div id="datos">
            NIF: <input type="text" name="nif"><br><br>
            Nombre: <input type="text" name="nombre"><br><br>
            Cuenta bancaria: <input type="text" name="cuenta_bancaria"><br><br></div>
            <div id="botones"><input type="submit" name="alta" value="Alta">
            <input type="submit" name="baja" value="Baja">
            <input type="submit" name="consultar" value="Consultar clientes"></div>
        </form>
        <?php
            include 'funcionesFloristeria.php';
            if (isset($boton)){
                if ($boton==0){
                    if (isset($_REQUEST['nif']) && $_REQUEST['nif']!="" 
                    && isset($_REQUEST['nombre']) && $_REQUEST['nombre']!="" 
                    && isset($_REQUEST['cuenta_bancaria']) && $_REQUEST['cuenta_bancaria']!=""){
                        if (!clienteExists($_REQUEST['nif'])){
                            $conexion=mysqli_connect("localhost","root","","practica")
                                or die("Problemas de conexión");
                            $insert="INSERT INTO cliente VALUES ('$_REQUEST[nif]','$_REQUEST[nombre]','$_REQUEST[cuenta_bancaria]');";
                            mysqli_query($conexion,$insert) 
                                or die("Problemas en el insert: ".mysqli_error($conexion));
                            mysqli_close($conexion);
                            echo "<p id=\"message\">El cliente ha sido dado de alta</p>";
                        }
                        else {
                            echo "<p id=\"message\">Error: El cliente con este NIF ya estaba registrado.</p>";
                        }
                    }
                    else {
                        echo "<p id=\"message\">Tienes que completar todos los campos</p>";
                    }
                } else if ($boton==1){
                    if (isset($_REQUEST['nif']) && $_REQUEST['nif']!=""){
                        if (clienteExists($_REQUEST['nif'])){
                            if (clienteSinCompra($_REQUEST['nif'])){
                                $conexion=mysqli_connect("localhost","root","","practica")
                                    or die("Problemas de conexión");
                                $delete="DELETE FROM cliente WHERE nif='$_REQUEST[nif]';";
                                mysqli_query($conexion,$delete) 
                                    or die("Problemas en el delete: ".mysqli_error($conexion));
                                mysqli_close($conexion);
                                echo "<p id=\"message\">Se ha borrado el cliente con nif ".$_REQUEST['nif']."</p>";
                            }
                            else {
                                echo "<p id=\"message\">Error: No se puede dar de baja al cliente con nif ".$_REQUEST['nif']." porque ya ha realizado una compra.</p>";
                            }
                        }
                        else {
                                echo "<p id=\"message\">No existe el cliente con nif ".$_REQUEST['nif']."</p>";
                        }
                    }
                    else {
                        echo "<p id=\"message\">Tienes que indicar el nif del cliente.</p>";
                    }
                } else if ($boton==2) {
                    $conexion=mysqli_connect("localhost","root","","practica")
                        or die("Problemas de conexión");
                    $select="SELECT nif, nombre, cuenta_bancaria FROM cliente;";
                    $filas=mysqli_query($conexion,$select) 
                        or die("Problemas en el select: ".mysqli_error($conexion));
                    echo "<table id=\"tClientes\"><tr><th>NIF</th><th>Nombre</th><th>Cuenta bancaria</th></tr>";
                    if ($filas) {
                        $fila=mysqli_fetch_array($filas);
                        while ($fila) {
                            echo "<tr><td>".$fila['nif']."</td><td>".$fila['nombre']."</td><td>".$fila['cuenta_bancaria']."</td></tr>";
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