<html>
    <meta charset="utf-8">
    <head>
        <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
        <meta http-equiv="Pragma" content="no-cache" />
        <meta http-equiv="Expires" content="0" />
        <script>
            if (window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
        </script>
    </head>
    <?php
        if (isset($_REQUEST['env'])){
            $ope=$_REQUEST['ope'];
        }
    ?>
    <body>
        <form method="post" action="">
            <b>¿Qué quieres hacer?</b><br>
                <input type="radio" name="ope" value="suma" checked> Suma<br>
                <input type="radio" name="ope" value="max"> Máximo<br><br>
            <b>¿Cuántos números quieres?</b>
            <select name="total">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br><br>
            <input type="submit" value="Enviar" name="env">
        </form><br>
        <?php
            if (isset($ope)){
                $nums=array(rand(1,100),rand(1,100),rand(1,100),rand(1,100),rand(1,100));
                echo "<table style=\"border: 1px solid black\"><tr><th>Números</th></tr>";
                for ($i=0; $i<sizeof($nums); $i++){
                    echo "<tr><td>$nums[$i]</td></tr>";
                }
                echo "</table><br>";
                if ($ope=="suma"){
                    $res=0;
                    for ($i=0; $i<$_REQUEST['total']+1; $i++){
                        $res+=$nums[$i];
                    }
                    echo "La suma es de $res";
                }
                else {
                    $res=$nums[0];
                    for ($i=1; $i<$_REQUEST['total']+1; $i++){
                        if ($res<$nums[$i]){
                            $res=$nums[$i];
                        }
                    }
                    echo "Le máximo es el $res";
                }
            }
        ?>
    </body>
</html>