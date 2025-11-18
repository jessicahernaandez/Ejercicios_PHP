<?php 

    // Funcion que coloca la posicion de las fichas en la fila de destino
    // (Teniendo en cuenta que esta funcion solo se llamara si hay menos de 3 fichas tanto en X como de O en el tablero).
    // Pasamos el string por referencia & para que cambie el tablero original. SI
    function colocaFichasDestino (string &$strTablero, int $intFilaDestino, int $intColumnaDestino, string $strCaracter): bool {

        $blnPoneFicha = false;

            if($strTablero[$intFilaDestino * 3 + $intColumnaDestino ] == 'B') {
                $strTablero[$intFilaDestino * 3 + $intColumnaDestino] = $strCaracter;
                $blnPoneFicha = true;
            }

        return $blnPoneFicha;
    }

    // Funcion que mueve una ficha de origen hacia una de destino, verifica que la ficha sea una de las indicadas, y si
    // ha logrado moverlo, llama a la funcion anterior para colocarlo en la ficha de origen. SI
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

    //Funcion que deja las fichas de O juntas. Se llama cuando ya existe un O.
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

    //Funcion en la que compruebo si pueden ganar al poner la tercer ficha, si no puede, entonces bloquea a X.
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

    //Funcion para saber si hay algun ganador. SI
    function compruebaGanador (string &$strTablero, string $strCaracterX, string $strCaracterO, array $posicionesGanadoras) : string {

        $ganaCharacter = 'B';

        $coincidenciasX = 0;
        $coincidenciasO = 0;
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