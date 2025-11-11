<?php

    // digitos(int $num): int → devuelve la cantidad de dígitos de un número.
    function digitos (int $num) : int {
        $numDigitos = strlen(strval($num));
    
        return $numDigitos;
    }

    // digitoN(int $num, int $pos): int → devuelve el dígito que ocupa, empezando por la izquierda, la posición $pos.
    function digitoN (int $num, int $pos) : int {

        $arrNum = (array) $num;
        print_r($arrNum);
        $pos= 0;

        return $pos;
    }

    echo digitoN(12856, 1);


?>