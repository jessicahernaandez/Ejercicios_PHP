<?php 

    //Funcion para saber si hay algun ganador.
    function compruebaGanador (string $strTablero, string $strCaracterX, string $strCaracterO) : string {

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

    //Funcion que diga si puede ganar O



    //Funcion que deja pone a O en posicion ganadora.

    

    //Funcion que bloquee a X si no puede ganar O
    
?>