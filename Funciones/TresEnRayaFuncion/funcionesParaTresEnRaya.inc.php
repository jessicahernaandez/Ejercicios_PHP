<?php 

    // Funcion que coloca la posicion de las fichas en la fila de destino.
    // Pasamos el string por referencia & para que cambie el tablero original. 
    function colocaFichasDestino (string &$strTablero, int $intFilaDestino, int $intColumnaDestino, string $strCaracter): bool {

        $blnPoneFicha = false;

            //Verifico si la posicion que me han pasado esta vacia.
            if($strTablero[$intFilaDestino * 3 + $intColumnaDestino ] == 'B') {
                $strTablero[$intFilaDestino * 3 + $intColumnaDestino] = $strCaracter;
                $blnPoneFicha = true;
            }

        return $blnPoneFicha;
    }

    // Funcion que mueve una ficha de origen hacia una de destino, verifica que la ficha sea una de las indicadas, y si
    // ha logrado moverlo, llama a la funcion anterior para colocarlo en la ficha de origen. 
    function colocaFichasOrigenyDestino (string &$strTablero, int $intFilaDestino, int $intColumnaDestino, int $intFilaOrigen, int $intColumnaOrigen, string $strCaracter) : bool {
        $blnPoneFicha = false;

        if (isset($strTablero[($intFilaOrigen * 3 + $intColumnaOrigen)]) && $strTablero[($intFilaOrigen * 3 + $intColumnaOrigen)] === $strCaracter) {
            if(colocaFichasDestino($strTablero, $intFilaDestino, $intColumnaDestino, $strCaracter)) {
                $strTablero[($intFilaOrigen * 3 + $intColumnaOrigen)] = 'B';
                $blnPoneFicha = true;
            } 
        }

        return $blnPoneFicha;
    }

    //Funcion que verifica si hay 2 fichas 'O' en posicion ganadora y si es asi, pone la tercer ficha en la posicion ganadora vacia.
    function puedeGanarO (string &$strTablero, array $posicionesGanadoras) : int {
        $posicionGanar = -1;

        foreach($posicionesGanadoras as $combinacion) {
            $cuantasO = 0;
            $posLibre = -1;
            foreach($combinacion as $posicion) {
                if($strTablero[$posicion] === 'O') {
                    $cuantasO++;
                } else if ($strTablero[$posicion] === 'B') {
                    $posLibre = $posicion;
                }
            }

            if($cuantasO == 2 && $posLibre != -1) {
                $posicionGanar = $posLibre;
            }
        }

        return $posicionGanar;
    }

    //Funcion en la que compruebo si O puede bloquear a la ficha X, de ser asi, devuelve la posicion del tablero.
    function ObloqueaX (string &$strTablero, array $posicionesGanadoras): int {

        $posicionBloquear = -1;

        foreach($posicionesGanadoras as $combinacion) {
            $cuantasX = 0;
            $posLibre = -1;
            foreach($combinacion as $posicion) {
                if($strTablero[$posicion] === 'X') {
                    $cuantasX++;
                } else if ($strTablero[$posicion] === 'B') {
                    $posLibre = $posicion;
                }
            }

            if($cuantasX == 2 && $posLibre != -1) {
                $posicionBloquear = $posLibre;
            }
        }
        return $posicionBloquear;
    }

    //Funcion para saber si hay algun ganador. 
    function compruebaGanador (string &$strTablero, string $strCaracterX, string $strCaracterO, array $posicionesGanadoras) : string {

        $ganaCharacter = 'B';

        foreach($posicionesGanadoras as $intFila) {
            $coincidenciasO = 0;
            $coincidenciasX = 0;
            foreach($intFila as $posicion) {
                if($strTablero[$posicion] == $strCaracterX) {
                    $coincidenciasX++;
                } elseif ($strTablero[$posicion] == $strCaracterO) {
                    $coincidenciasO++;
                }
            }

            if($coincidenciasX == 3) {
                $ganaCharacter = 'X';
            } elseif ($coincidenciasO == 3) {
                $ganaCharacter = 'O';
            }
        }

        return $ganaCharacter;
    }   

    //Funcion para mostrar el tablero.
    function muestraTablero (string &$strTablero) : void {
        echo "<table border='1'>\n";
            for($intFila=0;$intFila<3;$intFila++) {
                    echo "\t<tr>\n";
                    for ($intColumna = 0; $intColumna < 3; $intColumna++) {
                        $chrCaracter= $strTablero[$intFila * 3 + $intColumna ]??'B'; // si no he cogido el valor del tablero entiende que está vacío al indicar la B
                        $chrCaracter= $chrCaracter == 'B' ? '&nbsp;&nbsp;&nbsp;':$chrCaracter;
                        echo "\t\t<td>$chrCaracter</td>\n";
                    }
                    echo "\t</tr>\n";
            }
            echo "</table>\n";


            echo "<input type='hidden' name='tablero' value='$strTablero'>";
    }
?>