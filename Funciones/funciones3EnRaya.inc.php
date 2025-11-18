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

    // Funcion que me devuelve en un array las 2 posiciones randon de las maquinas, tanto si es de destino como de origen.
    // Lo intentamos dejar siempre en funcion ganadora. SI
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

    //Funcion para saber si hay algun ganador. SI
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

    // Funcion para cuando tengamos 1 o 2 O en el tablero. En el caso que solo tengamos una O, pondramos una O en alguna
    // de las posiciones ganadoras, si ya tenemos 2 O, verificaremos si podemos ponerla en la posicion disponible, de no se posible
    // bloqueamos a la X. SI
    function OenLineaoBloquea (string &$strTablero) : array {
        $posicionesO = [];

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
            $cuantasO = 0;
            $posLibre = -1;
            $cuantasX = 0;
            foreach($intFila as $posicion) {
                if ($strTablero[$posicion] == 'O') {
                    $cuantasO++;
                } else if ($strTablero[$posicion] == 'B') {
                    $posLibre = $posicion;
                } else if ($strTablero[$posicion] == 'X') {
                    $cuantasX++;
                }

                if ($cuantasO == 1 && $strTablero[$posLibre] == 'B') {
                    do {
                            $intFilaO = rand(0,2);
                            $intColumnaO = rand(0,2);
                            $posicionesO[0] = $intFilaO;
                            $posicionesO[1] = $intColumnaO;
                    } while($intFilaO * 3 + $intColumnaO != $posLibre);
                } else if($cuantasO == 2) {
                    if ($strTablero[$posLibre] == 'B') {
                        do {
                            $intFilaO = rand(0,2);
                            $intColumnaO = rand(0,2);
                            $posicionesO[0] = $intFilaO;
                            $posicionesO[1] = $intColumnaO;
                        } while($intFilaO * 3 + $intColumnaO != $posLibre);
                    } else { //Si no es porque el espacio no esta vacio, asi que bloquearemos.
                        if($cuantasX == 2 && $strTablero[$posLibre] == 'B') {
                             do {
                                $intFilaO = rand(0,2);
                                $intColumnaO = rand(0,2);
                                $posicionesO[0] = $intFilaO;
                                $posicionesO[1] = $intColumnaO;
                            } while($intFilaO * 3 + $intColumnaO != $posLibre);
                        }
                    }
                }
            }
        }

        return $posicionesO;
    }

    // Funcion para mover fichas de O, teniendo en cuenta que ya tenemos las 3 fichas en el tablero, asi podemos moverlas
    // en posiciones ganadoras.
    function ganaO (string &$strTablero) : array {

        $posicionesO = [];

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

        $posicionesExistentesO = [];
        //Primero recorro el tablero y me guardo en las posiciones que se encuentra las 3 fichas de O.
        for($intCont=0;$intCont<strlen($strTablero);$intCont++) {
            if($strTablero[$intCont] == 'O') {
                $posicionesExistentesO[] = $intCont;
            }
        }

        //Una vez tengo las posiciones, recorro el array de posiciones ganadoras.
        foreach($posicionesGanadoras as $intFila) {
            $posicionAcambiar = -1;
            $cuantasO = 0;
            foreach($intFila as $posicion) { //Pregunto por cada fila, si la posicion es alguna de las posiciones de O.
                if($posicion == $posicionesExistentesO[0] || $posicion == $posicionesExistentesO[1] ||$posicion == $posicionesExistentesO[2]) {
                    $cuantasO++;
                } else { // Si no es ninguna de las posiciones de O me las guardare.
                    $posicionparaCambiar = $posicion; //Aqui es donde debemos cambiar la O.
                }

                //Una vez hecha esta verificacion pregunto, si hay 2 O, entonces hay que cambiar la O para la posicion anterior.
                if($cuantasO == 2 && $strTablero[$posicionAcambiar] == 'B') {
                    do {
                        $intFilaO = rand(0,2);
                        $intColumnaO = rand(0,2);
                        $posicionesO[0] = $intFilaO;
                        $posicionesO[1] = $intColumnaO;
                    } while($intFilaO * 3 + $intColumnaO != 'O' && in_array($intFilaO * 3 + $intColumnaO,$intFila)); //Para que genere la posicion de origen, mientras este en $intFila.

                    //Una vez sale del do-while, tenemos las posiciones de Origen, ahora sacaremos la del destino.
                    do {
                        $intFilaO = rand(0,2);
                        $intColumnaO = rand(0,2);
                        $posicionesO[2] = $intFilaO;
                        $posicionesO[3] = $intColumnaO;
                    } while($intFilaO * 3 + $intColumnaO != $posicionparaCambiar);
                }
            }
        }

        return $posicionesO;
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