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
            Matrícula: <input type="text" name="matricula"><br><br>
            <input type="submit" name="borrar" value="Dar de baja">
        </form>
        <?php
            if (isset($_REQUEST['borrar'])){
                if (isset($_REQUEST['matricula'])){
                   $conexion=mysqli_connect("localhost", "root", "", "prueba")
                        or die("Problemas en la conexión");
                   $select="SELECT COUNT(*) AS cont FROM coche
                        WHERE matricula='$_REQUEST[matricula]'";
                    $filas=mysqli_query($conexion,$select)
                        or die("Problemas con el select: ".mysqli_error($conexion));
                    if ($filas){
                        $fila=mysqli_fetch_array($filas);
                        if ($fila['cont']==0){
                            echo "No existe un coche con la matrícula ".$_REQUEST['matricula'];
                        }
                        else {
                            $delete="DELETE FROM coche WHERE matricula='$_REQUEST[matricula]'";
                            mysqli_query($conexion, $delete) 
                                or die("Problemas con el delete: ".mysqli_error($conexion));
                            echo "Se ha dado de baja el coche con matrícula ".$_REQUEST['matricula'];
                        }
                    }
                    mysqli_close($conexion);
                } 
                else {
                    echo "Has de introducir una matrícula";
                }
            }
        ?>
    </body>
</html>