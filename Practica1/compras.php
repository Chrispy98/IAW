<html>
    <meta charset="utf-8">
    <head>
        <title>Compras · Floristería</title>
        <link rel="stylesheet" href="floristeria.css">
        <h1>Compras</h1>
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
            <a href="principal.php"><img id="homePic" src="pics/home-page.png"></a>
            <a href="almacen.php">ALMACÉN</a>
            <a href="clientes.php">CLIENTES</a>
            <a href="compras.php">COMPRAS</a>
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
                        if (existeFlor($_REQUEST['idflor'])){
                            if (hayStock($_REQUEST['idflor'], $_REQUEST['cantidad'])) {
                                if (sePuedeComprar($_REQUEST['idflor'])){
                                    $conexion=mysqli_connect("localhost", "root", "", "practica") 
                                         or die("Problemas en la conexión");
                                    $insert="INSERT INTO compras (nif, idflor, fecha, cantidad)
                                        VALUES ('$_REQUEST[nif]', $_REQUEST[idflor], NOW(), $_REQUEST[cantidad])";
                                    mysqli_query($conexion,$insert)
                                        or die("Problemas en el insert: ".mysqli_error($conexion));
                                    mysqli_close($conexion);
                                    $conexion=mysqli_connect("localhost", "root", "", "practica") 
                                         or die("Problemas en la conexión");
                                    $update="UPDATE flores SET cantidad=cantidad-$_REQUEST[cantidad] WHERE idFlor=$_REQUEST[idflor]";
                                    mysqli_query($conexion,$update)
                                        or die ("Problemas en el update: ".mysqli_error($conexion));
                                    mysqli_close($conexion);
                                    echo "Compra realizada correctamente";
                                }
                                else {
                                    echo "Espérese unos instantes para comprar esta flor. Perdona las molestias.";
                                }
                            }
                            else {
                                echo "No hay suficiente stock para la cantidad deseada";
                            }
                        }
                        else {
                            echo "No existe la flor con ID ".$_REQUEST['idflor'].". Puedes consultar las flores pinchando <a href=\"almacen.php\">aquí</a>";
                        }
                    }
                    else {
                        echo "Cliente no existente. Puedes darte de alta pinchando <a href=\"clientes.php\">aquí</a>";
                    }
                }
                else {
                    echo "Tienes que completar todos los campos";
                }
            } 
            
            else if ($boton==1){
                $conexion=mysqli_connect("localhost","root","","practica")
                        or die("Problemas de conexión");
                $select="SELECT idcompra, idflor, cantidad, nif, date_format(fecha, '%d-%m-%Y %H:%i:%s') AS fec FROM compras;";
                $filas=mysqli_query($conexion,$select) 
                    or die("Problemas en el select: ".mysqli_error($conexion));
                if ($filas) {
                    $fila=mysqli_fetch_array($filas);
                    while ($fila) {
                        echo "<br>IDCompra: ".$fila['idcompra']." | IDFlor: ".$fila['idflor']." | NIF: ".$fila['nif']." | Cantidad: ".$fila['cantidad'].
                            " | Fecha: ".$fila['fec']."<br>";
                        $fila=mysqli_fetch_array($filas);
                    }
                }
                mysqli_close($conexion);
            }
        }
    ?>
</html>