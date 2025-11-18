<?php
    $titulo = "3 en Raya Funciones";
    include("cabecera.inc.php");

?>
        <form method="get">

            Fila Origen: <input type="number" min="0" max="2" name="filaOrigen">
            Columna Origen: <input type="number" min="0" max="2" name="columnaOrigen"> <br/>
            Fila Destino: <input type="number" min="0" max="2" name="filaDestino">
            Columna Destino: <input type="number" min="0" max="2" name="columnaDestino"> <br/>

            <?php
            //muevo la ficha X
            function movimientoX(string &$strTablero): bool{
                $intFilaOrigen = $_GET["filaOrigen"] ?? -1;
                $intColumnaOrigen = $_GET["columnaOrigen"] ?? -1;
                $intFilaDestino = $_GET["filaDestino"] ?? -1;
                $intColumnaDestino = $_GET["columnaDestino"] ?? -1;
                $blnPoneX = false; // indica si X ha podido mover la ficha

                // Movimiento del jugador X
                if ($intFilaDestino >= 0 && $intFilaDestino <= 2 && $intColumnaDestino >= 0 && $intColumnaDestino <= 2) {
                    $destino = $intFilaDestino * 3 + $intColumnaDestino;
                    if ($strTablero[$destino] == 'B') {
                        if (substr_count($strTablero, 'X') < 3) {
                            $strTablero[$destino] = 'X';
                            $blnPoneX = true;
                        } else {
                            if(is_numeric($intFilaOrigen)    && $intFilaOrigen>=0 && $intFilaOrigen<3 &&
                               is_numeric($intColumnaOrigen) && $intColumnaOrigen>=0 && $intColumnaOrigen<3)
                                    $origen = $intFilaOrigen * 3 + $intColumnaOrigen;
                            else
                                    $origen = -1;// no dejo que sea X si no está en el rango indicado
        echo "****$origen fila $intFilaOrigen columna $intColumnaOrigen ***".(is_numeric($intColumnaOrigen) )."@@@";
                            if ($origen>0 && $strTablero[$origen] == 'X') {
                                $strTablero[$origen] = 'B';
                                $strTablero[$destino] = 'X';
                                $blnPoneX = true;
                            } else
                                echo "No puedes mover una ficha que no es tuya.";
                        }
                    } else
                        echo "No puedes poner una ficha en una casilla ocupada.";
                }
                return $blnPoneX;
            }

            // Comprueba si hay un ganador y lo devuelve si es así. Si nadie gana devuelve B
            function comprobarGanador(string $tablero): string {
                $arrIntComprobar = [ //guardo las posiciones del array que hay que mirar si son iguales
                    [0,1,2], [3,4,5], [6,7,8], // filas
                    [0,3,6], [1,4,7], [2,5,8], // columnas
                    [0,4,8], [2,4,6]           // diagonales
                ];
                foreach (['X', 'O'] as $chrJugador) // miro con un jugador y con otro
                    foreach ($arrIntComprobar as $arrElemento) // para cada fila columna o diagonal, compruebo si hay un ganador
                        if ($tablero[$arrElemento[0]] == $chrJugador &&
                            $tablero[$arrElemento[1]] == $chrJugador &&
                            $tablero[$arrElemento[2]] == $chrJugador)
                                return $chrJugador;
                return 'B'; // si no se ha salido porque no ha habido ningún ganador, devolvemos B
            }

            // Devuelve el índice donde el jugador puede ganar en el siguiente movimiento
            function posicionGanar($tablero, $jugador) {
                $lineas = [
                    [0,1,2], [3,4,5], [6,7,8],
                    [0,3,6], [1,4,7], [2,5,8],
                    [0,4,8], [2,4,6]
                ];
                foreach ($lineas as $l) {
                    $a = $l[0]; $b = $l[1]; $c = $l[2];
                    $valores = [$tablero[$a], $tablero[$b], $tablero[$c]];
                    if (count(array_keys($valores, $jugador)) == 2 && in_array('B', $valores)) {
                        return $l[array_search('B', $valores)];
                    }
                }
                return -1;
            }

            // Determina el mejor movimiento para O
            function mejorMovimientoO($tablero) {
                // 1. Ganar
                $pos = posicionGanar($tablero, 'O');
                if ($pos != -1) return $pos;

                // 2. Bloquear a X
                $pos = posicionGanar($tablero, 'X');
                if ($pos != -1) return $pos;

                // 3. Centro
                if ($tablero[4] == 'B') return 4;

                // 4. Esquinas
                foreach ([0,2,6,8] as $e) {
                    if ($tablero[$e] == 'B') return $e;
                }

                // 5. Aleatorio
                $libres = [];
                for ($i = 0; $i < 9; $i++) {
                    if ($tablero[$i] == 'B') $libres[] = $i;
                }
                return count($libres) > 0 ? $libres[array_rand($libres)] : -1;
            }

            // Imprime el tablero
            function imprimirTablero($tablero) {
                echo "<table border='1'>";
                for ($f = 0; $f < 3; $f++) {
                    echo "<tr>";
                    for ($c = 0; $c < 3; $c++) {
                        $valor = $tablero[$f * 3 + $c];
                        $caracter = ($valor == 'B') ? '&nbsp;&nbsp;&nbsp;' : $valor;
                        echo "<td align='center' width='30'>$caracter</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }



            //***********************************
            // ********Programa Pincipal*********
            //***********************************

            $strTablero = $_GET["tablero"] ?? "BBBBBBBBB"; // los valores B indican que está vacío



        $blnPoneX = movimientoX($strTablero);

        // Movimiento de O (la máquina)
            if ($blnPoneX) {
                $numO = substr_count($strTablero, 'O');
                $mejor = mejorMovimientoO($strTablero);

                if ($numO < 3) {
                    if ($mejor != -1) $strTablero[$mejor] = 'O';
                } else {
                    // Mueve una ficha O existente
                    $fichasO = [];
                    for ($i = 0; $i < 9; $i++) {
                        if ($strTablero[$i] == 'O') $fichasO[] = $i;
                    }
                    if ($mejor != -1 && count($fichasO) > 0) {
                        $origen = $fichasO[array_rand($fichasO)];
                        $strTablero[$origen] = 'B';
                        $strTablero[$mejor] = 'O';
                    }
                }
            }

            // Comprobar ganador
            $ganador = comprobarGanador($strTablero);
            if ($ganador != 'B') {
                echo "<h1>Ha ganado $ganador</h1>";
            } else {
                echo "<p><input type='submit' value='Mover'></p>";
            }

            // Mostrar tablero
            imprimirTablero($strTablero);

            // Guardar tablero actual
            echo "<input type='hidden' name='tablero' value='$strTablero'>";
            echo "</form>";

    include("pie.inc.html");
?>