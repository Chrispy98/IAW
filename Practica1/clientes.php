<html>
    <meta charset="utf-8">
    <head>
        <title>Clientes · Floristería</title>
        <h1>Clientes</h1>
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
        <a href="principal.html">Home</a>
        <a href="almacen.html">Almacén</a>
        <a href="clientes.html">Clientes</a>
        <a href="compras.html">Compras</a><br><br>
        <form action="" method="post">
            DNI: <input type="text" name="dni"><br><br>
            Nombre: <input type="text" name="nombre"><br><br>
            Cuenta bancaria: <input type="text" name="cuenta_bancaria"><br><br>
            <input type="submit" name="alta" value="Alta">
            <input type="submit" name="baja" value="Baja">
            <input type="submit" name="consultar" value="Consultar clientes">
        </form>
        <?php
            if (isset($boton)){
                if ($boton==0){
                    if (isset($_REQUEST['dni']) && $_REQUEST['dni']!="" 
                    && isset($_REQUEST['nombre']) && $_REQUEST['nombre']!="" 
                    && isset($_REQUEST['cuenta_bancaria']) && $_REQUEST['cuenta_bancaria']!=""){
                        $conexion=mysqli_connect("localhost","root","","practica")
                            or die("Problemas de conexión");
                        $insert="INSERT INTO cliente VALUES ('$_REQUEST[dni]','$_REQUEST[nombre]','$_REQUEST[cuenta_bancaria]');";
                        mysqli_query($conexion,$insert) 
                            or die("Problemas en el insert: ".mysqli_error($conexion));
                        mysqli_close($conexion);
                        echo "El cliente ha sido dado de alta";
                    }
                    else {
                        echo "Tienes que completar todos los campos";
                    }
                } else if ($boton==1){
                    if (isset($_REQUEST['dni']) && $_REQUEST['dni']!=""){
                        $conexion=mysqli_connect("localhost","root","","practica")
                            or die("Problemas de conexión");
                        $delete="DELETE FROM cliente WHERE dni='$_REQUEST[dni]';";
                        mysqli_query($conexion,$delete) 
                            or die("Problemas en el delete: ".mysqli_error($conexion));
                        mysqli_close($conexion);
                        echo "Se ha borrado el cliente con DNI ".$_REQUEST['dni'];
                    }
                    else {
                        echo "Tienes que indicar el DNI del cliente.";
                    }
                } else if ($boton==2) {
                    $conexion=mysqli_connect("localhost","root","","practica")
                        or die("Problemas de conexión");
                    $select="SELECT dni, nombre, cuenta_bancaria FROM cliente;";
                    $filas=mysqli_query($conexion,$select) 
                        or die("Problemas en el select: ".mysqli_error($conexion));
                    if ($filas) {
                        $fila=mysqli_fetch_array($filas);
                        while ($fila) {
                            echo "DNI: ".$fila['dni']." | Nombre: ".$fila['nombre']." | Cuenta bancaria: ".$fila['cuenta_bancaria']."<br>";
                            $fila=mysqli_fetch_array($filas);
                        }
                    }
                    mysqli_close($conexion);
                }
            }
        ?>
    </body>
</html>