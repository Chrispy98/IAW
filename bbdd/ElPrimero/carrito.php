<html>
    <meta charset="utf-8">
    <head></head>
    <body>
        <?php
            $conexion=mysqli_connect("localhost","root","","prueba") or
                die("Problemas con la conexión");

            $insercion="insert into coche values 
                ('$_REQUEST[matricula]','$_REQUEST[marca]')";

            mysqli_query($conexion,$insercion)
                 or die("Problemas en el select".mysqli_error($conexion));
        
            mysqli_close($conexion); 

            echo "El coche ha sido dado de alta";
        ?>
    </body>
</html>