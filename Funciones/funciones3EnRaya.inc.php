<?php 

    // Funcion que coloca la posicion de las fichas en la fila de destino
    // (Teniendo en cuenta que esta funcion solo se llamara si hay menos de 3 fichas tanto en X como de O en el tablero).
    // Pasamos el string por referencia & para que cambie el tablero original.
    function colocaFichasDestino (string &$strTablero, int $intFilaDestino, int $intColumnaDestino, string $strCaracter): bool {

        $blnPoneFicha = false;

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

    // Funcion que me devuelve en un array las 2 posiciones randon de las maquinas, tanto si es de destino como de origen.
    // Lo intentamos dejar siempre en funcion ganadora
    function fichasAleatoriasO (string &$strTablero, string $strCaracter) : array {
        $posicionesFichaO = [];

            do {
                $intFilaDestino = rand(0, 2);
                $intColumnaDestino = rand(0, 2);
                $posicionesFichaO[0] = $intFilaDestino;
                $posicionesFichaO[1] = $intColumnaDestino;
            } while ($strTablero[$intFilaDestino * 3 + $intColumnaDestino] != $strCaracter);
     
        return $posicionesFichaO;

    }

    //Funcion para saber si hay algun ganador.
    function compruebaGanador (string &$strTablero, string $strCaracterX, string $strCaracterO) : string {

        $ganaCharacter = 'B';

        $posicionesGanadoras = [
            [0,3,6], //columna1
            [1,4,7], //columna2
            [2,5,8], //columna3
            [0,1,2], //fila1
            [3,4,5], //fila1
            [6,7,8], //fila3
            [0,4,8], //diagonal1
            [2,4,6]  //diagonal2
        ];

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

    //Funcion que diga si puede ganar O.
    function posicionGanaO (&$strTablero) : array {
        $arrPosicionesO = [];

        $posicionesGanadoras = [
            [0,3,6], //columna1
            [1,4,7], //columna2
            [2,5,8], //columna3
            [0,1,2], //fila1
            [3,4,5], //fila2
            [6,7,8], //fila3
            [0,4,8], //diagonal1
            [2,4,6]  //diagonal2
        ];

        foreach($posicionesGanadoras as $intFila) {
            $cuentaO = 0;
            $cuentaX = 0;
            $posLibre = -1;
            foreach($intFila as $posicion) {
                if($strTablero[$posicion] == 'O') {
                    $cuentaO++;
                } else if ($strTablero[$posicion] == 'B') {
                    $posLibre = $posicion;
                } else if($strTablero[$posicion] == 'X') {
                    $cuentaX++;
                } 

                if($cuentaO == 2 && $posLibre != -1) { //Quiere decir que tenemos posicion ganadora.
                     do {
                        $intFilaO = rand(0,2);
                        $intColumnaO = rand(0,2);
                        $arrPosicionesO[0] = $intFilaO;
                        $arrPosicionesO[1] = $intColumnaO;
                    } while($intFilaO * 3 + $intColumnaO != $posLibre);
                } else {
                    if($cuentaX == 2 && $posLibre != -1) {
                        do {
                            $intFilaO = rand(0,2);
                            $intColumnaO = rand(0,2);
                            $arrPosicionesO[0] = $intFilaO;
                            $arrPosicionesO[1] = $intColumnaO;
                        } while($intFilaO * 3 + $intColumnaO != $posLibre);
                    }
                }
            }
        }

        return $arrPosicionesO;
    }


    //Funcion que deja pone a O en posicion ganadora.

    

    //Funcion que bloquee a X si no puede ganar O

    //Funcion que deja las fichas de O juntas. Se llama cuando ya existe un O.
    function Oen2linea (string &$strTablero) : array {
        $arrayPosicionesO = [];
        $arrposicionesFinales = [];
        $posicionesGanadoras = [
            [0,3,6], //columna1
            [1,4,7], //columna2
            [2,5,8], //columna3
            [0,1,2], //fila1
            [3,4,5], //fila2
            [6,7,8], //fila3
            [0,4,8], //diagonal1
            [2,4,6]  //diagonal2
        ];

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

        //Ahora que tenemos un array con posiciones en las que podemos colocar la siguiente O, generamos las posiciones
        do {
            $intFilaO = rand(0,2);
            $intColumnaO = rand(0,2);
            $arrposicionesFinales[0] = $intFilaO;
            $arrposicionesFinales[1] = $intColumnaO;
        } while(!in_array($intFilaO * 3 + $intColumnaO, $arrayPosicionesO));

        return $arrposicionesFinales;
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