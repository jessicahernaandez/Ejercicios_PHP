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
            
            $columnaUsuario = strtolower($_GET["columnaUsuario"]);
            $filaUsuario = (int)$_GET["filaUsuario"];
            $ArrColumna = ['', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];

            $indiceColumna = 0;

            for($intIndice=0;$intIndice<9;$intIndice++) {
                if($ArrColumna[$intIndice] == $columnaUsuario) {
                    $indiceColumna = $intIndice;
                }
            }

            if($filaUsuario > 0 && $filaUsuario < 9 && $indiceColumna != 0) {
                $constante1 = $filaUsuario - $indiceColumna;
                $constante2 = $filaUsuario + $indiceColumna;

                echo "<br /><br />";
                echo "<table border=1>";
                echo "<tr><th></th><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th><th>h</th></tr>";
                for($intFila = 1;$intFila<=8;$intFila++) { 
                    echo "<tr>";
                    echo "<th style = 'border:none; width:20px;'>$intFila</th>";
                    for($intColumna=1;$intColumna<=8;$intColumna++) {
                        if($intFila == $filaUsuario && $intColumna == $indiceColumna) {
                            echo "<td><img src='alfil.png' alt='imagen-alfil' width=30px height=30px></td>"; 
                        } else if ($intFila - $intColumna == $constante1 || $intFila + $intColumna == $constante2) {
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
                echo "Haz introducido un número de fila o columna fuera del rango.";
            }
        }
    ?>
</body>
</html>