<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th {
            border: none;
        } 

        td {
            width: 30px;
            height: 30px;
        }
    </style>
</head>
<body>
    <?php     
        $valueFila = isset($_GET["filaUsuario"])  ? $_GET["filaUsuario"] : "";
        $valueColumna = isset($_GET["columnaUsuario"]) ? $_GET["columnaUsuario"] : "";
    ?>


    <h3>Posicion del Alfil</h3>
    <p>-Las filas estan representadas entre 1 y 8</p>
    <p>-Las columnas estan representadas entre a y b</p>
    <form action="" method="get">
        <label for="filaUsuario">Introduce una fila:</label>
        <input type="text" name="filaUsuario" value=<?=$valueFila?>><br />

        <label for="columnaUsuario">Introduce una columna:</label>
        <input type="text" name="columnaUsuario" value=<?=$valueColumna?>><br />

        <input type="submit" name="enviar">
    </form>

    <?php   
        if(isset($_GET["filaUsuario"]) && isset($_GET["columnaUsuario"])) {
            $filaAlfil = (int) $_GET["filaUsuario"];
            $columnaAlfil = strtolower($_GET["columnaUsuario"]);
            $intIndiceAlfil = 0;
            $ArrColumna = ['', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];

            //Consigo la posicion de la columna
            if(in_array($columnaAlfil, $ArrColumna)) {
                foreach($ArrColumna as $key => $value) {
                    if($value == $columnaAlfil) {
                        $intIndiceAlfil = $key;
                    }
                }
            } else {
                echo "La columna esta fuera del rango.";
            }

            if($filaAlfil > 0 && $filaAlfil < 9 && $intIndiceAlfil > 0 && $intIndiceAlfil < 9) {
                $arrPosiciones = [];
                $copiaFila = $filaAlfil;
                $copiaColumna = $intIndiceAlfil;
                
                //Primer Diagonal parte inferior
                while($copiaColumna <= 8) {
                    $copiaColumna++;
                    $copiaFila++;
                    if($copiaFila != 0 && $copiaColumna != 0 && $copiaFila <= 8 && $copiaColumna <=8) {
                        $arrPosiciones[] = [$copiaFila, $copiaColumna];
                    }
                }

                //Primer diagonal parte superior
                $copiaFila = $filaAlfil;
                $copiaColumna = $intIndiceAlfil;
                while($copiaFila >= 1) {
                    $copiaFila--;
                    $copiaColumna--;
                    if($copiaFila != 0 && $copiaColumna != 0 && $copiaFila >= 1 && $copiaColumna >=1) {
                        $arrPosiciones[] = [$copiaFila, $copiaColumna];
                    }
                }

                //Segunda diagonal parte inferior
                $copiaFila = $filaAlfil;
                $copiaColumna = $intIndiceAlfil;
                while($copiaFila <=8) {
                    $copiaFila++;
                    $copiaColumna--;
                    if($copiaFila != 0 && $copiaColumna != 0 && $copiaFila <= 8 && $copiaColumna >=1) {
                        $arrPosiciones[] = [$copiaFila, $copiaColumna];
                    }
                }

                //Segunda diagonal parte superior
                $copiaFila = $filaAlfil;
                $copiaColumna = $intIndiceAlfil;
                while($copiaColumna <= 8) {
                    $copiaFila--;
                    $copiaColumna++;
                    if($copiaFila != 0 && $copiaColumna != 0 && $copiaFila >= 1 && $copiaColumna <=8) {
                        $arrPosiciones[] = [$copiaFila, $copiaColumna];
                    }
                }

                echo "<br /><br />";
                echo "<table border=1>";
                echo "<tr><th></th><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th><th>h</th></tr>";
                for($intFila = 1;$intFila<=8;$intFila++) { 
                    echo "<tr>";
                    echo "<th style = 'border:none; width:20px;'>$intFila</th>";
                    for($intColumna=1;$intColumna<=8;$intColumna++) {
                        if($intFila == $filaAlfil && $intColumna == $intIndiceAlfil) {
                            echo "<td><img src='alfil.png' alt='imagen-alfil' width=30px height=30px></td>";
                        } else if (in_array([$intFila, $intColumna], $arrPosiciones)) {
                            echo "<td style='background-color:red;'></td>"; 
                        } else {
                            $colorTablero= ($intFila + $intColumna) % 2 == 0 ? "black" : "white";
                            echo "<td style='background-color:$colorTablero;'></td>";
                        }
                    }
                    echo "</tr>";
                }      
                
                echo "</table>";
            } else {
                echo "<br/>La fila esta fuera de rango.";
            }
        }
    
    ?>

</body>
</html>