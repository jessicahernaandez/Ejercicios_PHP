<?php

    // digitos(int $num): int → devuelve la cantidad de dígitos de un número.
    function digitos (int $num) : int {
        $numDigitos = strlen(strval($num));
    
        return $numDigitos;
    }



?>