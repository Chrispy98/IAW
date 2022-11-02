<?php
    function florExists($flor){
        $conexion=mysqli_connect("localhost", "root", "", "practica") 
            or die("Problemas en la conexión");
        $select="SELECT COUNT(*) AS cont FROM flores WHERE idflor=$flor";
        $filas=mysqli_query($conexion,$select)
            or die("Problemas con el select: ".mysqli_error($conexion));
        if ($filas){
            $fila=mysqli_fetch_array($filas);
            if ($fila['cont']==0){
                mysqli_close($conexion);
                return false;
            }
            else {
                mysqli_close($conexion);
                return true;
            }
        }
    }

    function clienteExists($cliente){
        $conexion=mysqli_connect("localhost", "root", "", "practica") 
            or die("Problemas en la conexión");
        $select="SELECT COUNT(*) AS cont FROM cliente WHERE dni='$cliente'";
        $filas=mysqli_query($conexion,$select)
            or die("Problemas con el select: ".mysqli_error($conexion));
        if ($filas){
            $fila=mysqli_fetch_array($filas);
            if ($fila['cont']==0){
                mysqli_close($conexion);
                return false;
            }
            else {
                mysqli_close($conexion);
                return true;
            }
        }
    }
?>