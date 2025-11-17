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
    function Oen2linea (string &$strTablero, array $posicionesGanadoras) : bool {

        $blnPoneFicha = false;
        $arrayPosicionesO = [];
        $posicionO = 0;

        //Primero busco la posicion en la que se encuenta la ficha O.
        for($intCont=0;$intCont<strlen($strTablero);$intCont++) {
            if($strTablero[$intCont] == 'O') {
                $posicionO = $intCont;
            }
        }

        //Ahora, dependiendo de esa posicion buscamos los lugares disponibles que tenemos para colocar la ficha O juntas.
        foreach($posicionesGanadoras as $intFila) {
            foreach($intFila as $posicion) {
                if(in_array($posicionO, $intFila) && $strTablero[$posicion] === 'B') { //Significa que esta vacio, entonces lo guardamos.
                    $arrayPosicionesO[] = $posicion;
                }
            }
        }

        //Ahora, tengo posiciones disponibles para ponerlas,
        if(count($arrayPosicionesO) == 2) {
            $indice = rand(0,1);
            $strTablero[$arrayPosicionesO[$indice]] = 'O';
            $blnPoneFicha = true;
        }
        
        return $blnPoneFicha;
    }

    //Funcion en la que compruebo si pueden ganar al poner la tercer ficha, si no puede, entonces bloquea a X.
    function OenLineaoBloquea(string &$strTablero, array $posicionesGanadoras): bool {

        $blnPoneFicha = false;

        // Intentar GANAR (O tiene 2 fichas y hay 1 libre).
        foreach ($posicionesGanadoras as $linea) {
            $posO = 0;
            $posLibre = -1;
            foreach ($linea as $pos) {
                if ($strTablero[$pos] === 'O'){
                    $posO++;
                } else if ($strTablero[$pos] === 'B') {
                    $posLibre = $pos;
                }
            }
            // Si puede ganar
            if ($posO === 2 && $posLibre !== -1) {
                $strTablero[$posLibre] = 'O';
                $blnPoneFicha = true;
            }
        }

        // Si no puede ganar, intenta BLOQUEAR a X 
        foreach ($posicionesGanadoras as $linea) {
            $posX = 0;
            $posLibre = -1;
            foreach ($linea as $pos) {
                if ($strTablero[$pos] === 'X') {
                    $posX++;
                } else if ($strTablero[$pos] === 'B') {
                    $posLibre = $pos;
                }
            }
            // Si puede bloquear la victoria de X
            if ($posX === 2 && $posLibre !== -1) {
                $strTablero[$posLibre] = 'O';
                $blnPoneFicha = true;
            }
        }

        return $blnPoneFicha;
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