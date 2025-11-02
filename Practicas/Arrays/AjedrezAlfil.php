<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movimiento Alfil</title>
</head>
<body>
    <h3>Movimientos disponibles del Alfil</h3>
    <p>*Las filas estan representadas del 1-8</p>
    <p>*Las filas estan representadas de la 'a'-'h'</p>
        <form method="get">
            <table>
                <tr>
                    <td><label for="filaAlfil">Introduce la fila: </label></td>
                    <td><input type="number" name="filaAlfil"></td>
                </tr>
                <tr>
                    <td><label for="columnaAlfil">Introduce la columna: </label></td>
                    <td><input type="text" name="columnaAlfil"></td>
                </tr>
            </table>
            <br>
            <input type="submit" name="enviar">  
            <br>
            <br>
        </form>

        <?php 

            if(isset($_GET['filaAlfil']) && isset($_GET['columnaAlfil'])) {
                $filaUsuario = $_GET['filaAlfil'];
                $columnaUsuario = strtolower($_GET['columnaAlfil']);
                $arrIndicesColumnas = ['', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
                $intIndiceColumna = 0;

                if(in_array($columnaUsuario, $arrIndicesColumnas)) {
                    foreach($arrIndicesColumnas as $indice => $letraColumna) {
                        if($columnaUsuario == $letraColumna) {
                            $intIndiceColumna = $indice;
                        }
                    }
                }

                if($filaUsuario>=1 && $filaUsuario <=8 && $intIndiceColumna>=1 && $intIndiceColumna<=8) {
                    
                    //Me creo el bucle donde guardare las posiciones correspondientes.
                    $filasPintar = [];
                    $copiaIndice = $intIndiceColumna;

                    //2 Bucles hasta la posicion del alfil, diagonales hacia abajo, de izquierda a derecha.
                    while($filaUsuario >=1 && $copiaIndice >=1) {
                        $filaUsuario--;
                        $copiaIndice--;
                        if($filaUsuario != 0 && $copiaIndice != 0 && $filaUsuario <= 8 && $copiaIndice <=8) {
                            $filasPintar[] = [$filaUsuario, $copiaIndice];
                        }
                    }

                    $filaUsuario = $_GET['filaAlfil'];
                    $copiaIndice = $intIndiceColumna;
                    while($filaUsuario <=8 && $copiaIndice <=8) {
                        $filaUsuario++;
                        $copiaIndice++;
                        if($filaUsuario != 0 && $copiaIndice != 0 && $filaUsuario <= 8 && $copiaIndice <=8) {
                            $filasPintar[] = [$filaUsuario, $copiaIndice];
                        }
                    }

                    //2 bucles hasta la posicion del alfil, pero ahora de derecha a izquierda.
                    $filaUsuario = $_GET['filaAlfil'];
                    $copiaIndice = $intIndiceColumna;
                    while($filaUsuario <=8 && $copiaIndice >=1) {
                        $filaUsuario++;
                        $copiaIndice--;
                        if($filaUsuario != 0 && $copiaIndice != 0 && $filaUsuario <= 8 && $copiaIndice <=8) {
                            $filasPintar[] = [$filaUsuario, $copiaIndice];
                        }
                    }

                    $filaUsuario = $_GET['filaAlfil'];
                    $copiaIndice = $intIndiceColumna;
                    while($filaUsuario >=1 && $copiaIndice <=8) {
                        $filaUsuario--;
                        $copiaIndice++;
                        if($filaUsuario != 0 && $copiaIndice != 0 && $filaUsuario <= 8 && $copiaIndice <=8) {
                            $filasPintar[] = [$filaUsuario, $copiaIndice];
                        }
                    }

                    //Pintamos el tablero
                    echo "<table border=1>";
                    for($intFila=1;$intFila<=8;$intFila++) {
                        echo "<tr>";
                        for($intColumna=1;$intColumna<=8;$intColumna++) {
                            if (in_array([$intFila,$intColumna], $filasPintar)) {
                                echo "<td style='width:25px; height:25px; background-color: red;'></td>";
                            } else {
                                $colorCasillas = ($intFila + $intColumna) % 2 == 0 ? "black" : "";
                                echo "<td style='width:25px; height:25px; background-color: $colorCasillas;'></td>";
                            }
                        }
                        echo "</tr>";
                    }

                    echo "</table>";

                } else {
                    echo "<p>Introduce una fila entre 1 y 8 y una columna entre 'a' y 'h'</p>";
                }
            }
        ?>
</body>
</html> 