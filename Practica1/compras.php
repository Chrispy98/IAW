<html>
    <meta charset="utf-8">
    <head>
        <title>Compras · Floristería</title>
        <link rel="stylesheet" href="floristeria.css">
         <!--<h1>Compras</h1>-->
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
        } else if (isset($_REQUEST['extracto'])){
            $boton=1;
        }
            
    ?>
    <body>
        <div id="links">
            <div class="links"><a href="principal.php"><img id="homePic" src="pics/home-page.png"></a></div>
            <div class="links"><a href="almacen.php">ALMACÉN</a></div>
            <div class="links"><a href="clientes.php">CLIENTES</a></div>
            <div id="compras" class="links"><a href="compras.php">COMPRAS</a></div>
        </div><br><br>
        <form action="" method="post">
            <div id="datos">
            NIF: <input type="text" name="nif"><br><br>
            IDFlor: <input type="number" name="idflor"><br><br>
            Cantidad: <input type="number" name="cantidad"><br><br></div>
            <div id="botones"><input type="submit" name="alta" value="Alta">
            <input type="submit" name="extracto" value="Extracto de compras"></div>
        </form>
    </body>
    <?php
        include 'funcionesFloristeria.php';
        if (isset($boton)) {
            if ($boton==0){
                if (isset($_REQUEST['nif']) && $_REQUEST['nif']!="" 
                && isset($_REQUEST['idflor']) && $_REQUEST['idflor']!=""
                && isset($_REQUEST['cantidad']) && $_REQUEST['cantidad']!="") {
                    if (clienteExists($_REQUEST['nif'])){
                        if (florExists($_REQUEST['idflor'])){
                            if (hayStock($_REQUEST['idflor'], $_REQUEST['cantidad'])) {
                                if (sePuedeComprar($_REQUEST['idflor'])){
                                    $precio=getPrice($_REQUEST['idflor']);
                                    $importeTotal=$precio*$_REQUEST['cantidad'];
                                    $conexion=mysqli_connect("localhost", "root", "", "practica") 
                                         or die("Problemas en la conexión");
                                    $insert="INSERT INTO compras (nif, idflor, fecha, cantidad, importe_total)
                                        VALUES ('$_REQUEST[nif]', $_REQUEST[idflor], NOW(), $_REQUEST[cantidad], $importeTotal)";
                                    mysqli_query($conexion,$insert)
                                        or die("Problemas en el insert: ".mysqli_error($conexion));
                                    mysqli_close($conexion);
                                    $conexion=mysqli_connect("localhost", "root", "", "practica") 
                                         or die("Problemas en la conexión");
                                    $update="UPDATE flores SET cantidad=cantidad-$_REQUEST[cantidad] WHERE idFlor=$_REQUEST[idflor]";
                                    mysqli_query($conexion,$update)
                                        or die ("Problemas en el update: ".mysqli_error($conexion));
                                    mysqli_close($conexion);
                                    echo "<p id=\"message\">Compra realizada correctamente</p>";
                                }
                                else {
                                    echo "<p id=\"message\">Espérese unos instantes para comprar esta flor. Perdona las molestias.</p>";
                                }
                            }
                            else {
                                echo "<p id=\"message\">No hay suficiente stock para la cantidad deseada</p>";
                            }
                        }
                        else {
                            echo "<p id=\"message\">No existe la flor con ID ".$_REQUEST['idflor'].". Puedes consultar las flores pinchando 
                                <a href=\"almacen.php\"><span>aquí</span></a></p>";
                        }
                    }
                    else {
                        echo "<p id=\"message\">Cliente no existente. Puedes darte de alta pinchando <a href=\"clientes.php\"><span>aquí</span></a></p>";
                    }
                }
                else {
                    echo "<p id=\"message\">Tienes que completar todos los campos</p>";
                }
            } 
            
            else if ($boton==1){
                $conexion=mysqli_connect("localhost","root","","practica")
                        or die("Problemas de conexión");
                $select="SELECT idcompra, idflor, cantidad, nif, date_format(fecha, '%d-%m-%Y %H:%i:%s') AS fec, importe_total FROM compras;";
                $filas=mysqli_query($conexion,$select) 
                    or die("Problemas en el select: ".mysqli_error($conexion));
                echo "<table><tr><th>IDCompra</th><th>IDFlor</th><th>NIF</th><th>Cantidad</th><th>Fecha</th><th>Importe total</th></tr>";
                if ($filas) {
                    $fila=mysqli_fetch_array($filas);
                    while ($fila) {
                        echo "<tr><td>".$fila['idcompra']."</td><td>".$fila['idflor']."</td><td>".$fila['nif']."</td><td>".$fila['cantidad']."</td><td>".$fila['fec']."</td><td>".$fila['importe_total']."</td></tr>";
                        $fila=mysqli_fetch_array($filas);
                    }
                }
                echo "</table>";
                mysqli_close($conexion);
            }
        }
    ?>
</html>