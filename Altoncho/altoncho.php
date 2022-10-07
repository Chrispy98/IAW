<html>
    <head>
        <style> #fst0 {color: indigo; }#fst1 {color: indigo; }#fst2 {color: indigo; }#fst3 { color: indigo; } #fst4 {color: red; }#fst5 {color: red; }#fst6 {color: red; }#fst7 {color: yellow; }#fst8 { color: yellow; }#fst9 { color: yellow; }#fst10 { color: lightgreen; } #fst11 {color: lightgreen; }#fst12 {color: lightgreen; }#fst13 {color: black;} #fst14 {color: black; } #fst15 { color: black; } #fst16 {color: brown;} #fst17 {color: brown; } #fst18 {color: brown;} #fst19 {lor: skyblue;}#fst20 { color: skyblue; }#fst21 {color: skyblue; } #fst22 {color: violet;}#fst23 { color: violet; }#fst24 {color: violet; } #fst25 { color: pink; }#fst26 {color: pink;}#fst27 {color: pink;} #fst28 {color: orange;}#fst29 {color: orange; }#fst30 {color: orange; }</style>
    </head>
    <body>
        <?php
            $alto=$_REQUEST['alto'];
            $ancho=$_REQUEST['ancho'];
            $forma=$_REQUEST['forma'];
            for ($i=0; $i<$alto; $i++){
                echo "<span id=\"fst$i\">";
                for ($j=0; $j<$ancho; $j++){
                    echo "$forma";
                }
                echo "</span>";
                echo "<br>";
            }
        ?>
    </body>
</html>