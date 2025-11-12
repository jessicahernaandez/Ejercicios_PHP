<?php

    // digitos(int $num): int → devuelve la cantidad de dígitos de un número.
    function digitos (int $num) : int {
        $numDigitos = strlen(strval($num));
    
        return $numDigitos;
    }

    // digitoN(int $num, int $pos): int → devuelve el dígito que ocupa, empezando por la izquierda, la posición $pos.
    function digitoN (int $num, int $pos) : int {

        //Num en String
        $strNum = strval($num);
        $digito = -1;

        if($pos < strlen($strNum)) {
            for($intCont=0;$intCont<strlen($strNum);$intCont++) {
                if($pos == $intCont) {
                    $digito = $strNum[$intCont-1];
                }
            }
        }

        return $digito;
    }

    // quitaPorDetras(int $num, int $cant): int → le quita por detrás (derecha) $cant dígitos.

    function quitaPorDetras (int $num, int $cant) : int {

        $strNum = strval($num);
        $strNumNuevo = "-1";

        if($cant < strlen($strNum)) {
            $pos = strlen($strNum) - $cant;
            $strNumNuevo = "";
            for($intCont=0;$intCont<=$pos;$intCont++) {
                $strNumNuevo .= $strNum[$intCont];
            }
        }

        $numDevolver = (int) $strNumNuevo;
        return $numDevolver;
    }

    

    

    // quitaPorDelante(int $num, int $cant): int → le quita por delante (izquierda) $cant dígitos.
    function quitaPorDelante (int $num, int $cant) : int {
        $strNum = strval($num);
        $strNumNuevo = "-1";

        if($cant < strlen($strNum)) {
            $strNumNuevo = "";

            for($intCont=$cant;$intCont<strlen($strNum);$intCont++) {
                $strNumNuevo .= $strNum[$intCont];
            }
        }

        $numDevolver = (int) $strNumNuevo;
        return $numDevolver;
    }

    

    


?>