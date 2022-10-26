<html>
    <meta charset="utf-8">
    <head></head>
    <body>
        <?php
            $conexion=mysqli_connect("localhost","root","","prueba")
                or die("Problemas de conexión");
            $select="SELECT matricula, marca FROM coche;";
            $filas=mysqli_query($conexion,$select) 
                or die("Problemas en el select: ".mysqli_error($conexion));
            if ($filas) {
                $fila=mysqli_fetch_array($filas);
                while ($fila) {
                    echo "Matrícula: ".$fila['matricula']." | Marca: ".$fila['marca']."<br>";
                    $fila=mysqli_fetch_array($filas);
                }
            }
            mysqli_close($conexion);
        ?>
    </body>
</html>