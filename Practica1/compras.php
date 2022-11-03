<html>
    <meta charset="utf-8">
    <head>
        <title>Compras · Floristería</title>
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
        <a href="principal.html">Home</a>
        <a href="almacen.html">Almacén</a>
        <a href="clientes.html">Clientes</a>
        <a href="compras.html">Compras</a><br><br>
        <form action="" method="post">
            NIF: <input type="text" name="dni"><br><br>
            ID: <input type="number" name="idflor"><br><br>
            Cantidad: <input type="number" name="cantidad"><br><br>
            <input type="submit" name="alta" value="Alta">
            <input type="submit" name="extracto" value="Extracto de compras">
        </form>
    </body>
    <?php
        include 'funcionesFloristeria.php';
        if (isset($boton)) {
            if ($boton==0){
                if (isset($_REQUEST['dni']) && $_REQUEST['dni']!="" 
                && isset($_REQUEST['idflor']) && $_REQUEST['idflor']!=""
                && isset($_REQUEST['cantidad']) && $_REQUEST['cantidad']!="") {
                    if (hayStock($_REQUEST['idflor'], $_REQUEST['cantidad'])) {
                        if (sePuedeComprar($_REQUEST['idflor'])){
                            $conexion=mysqli_connect("localhost", "root", "", "practica") 
                                 or die("Problemas en la conexión");
                            $insert="INSERT INTO compras VALUES ('$_REQUEST[dni]', $_REQUEST[idflor], NOW(), $_REQUEST[cantidad])";
                            mysqli_query($conexion,$insert)
                                or die ("Problemas en el insert: ".mysqli_error());
                            mysqli_close($conexion);
                            $conexion=mysqli_connect("localhost", "root", "", "practica") 
                                 or die("Problemas en la conexión");
                            $update="UPDATE flores SET cantidad=cantidad-$_REQUEST[cantidad] WHERE idFlor=$_REQUEST[idflor]";
                            mysqli_query($conexion,$update)
                                or die ("Problemas en el update: ".mysqli_error());
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
                    echo "Tienes que completar todos los campos";
                }
            } else if ($boton==1){
                $conexion=mysqli_connect("localhost","root","","practica")
                        or die("Problemas de conexión");
                $select="SELECT idflor, cantidad, dni, date_format(fecha, '%d-%m-%Y %H:%i:%s') AS fec FROM compras;";
                $filas=mysqli_query($conexion,$select) 
                    or die("Problemas en el select: ".mysqli_error($conexion));
                if ($filas) {
                    $fila=mysqli_fetch_array($filas);
                    while ($fila) {
                        echo "IDFlor: ".$fila['idflor']." | DNI: ".$fila['dni']." | Cantidad: ".$fila['cantidad'].
                            "| Fecha: ".$fila['fec']."<br>";
                        $fila=mysqli_fetch_array($filas);
                    }
                }
                mysqli_close($conexion);
            }
        }
    ?>
</html>