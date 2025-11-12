<?php 

    // Crea un archivo con funciones para sumar, restar, multiplicar y dividir dos números.

    //Funcion que suma 2 numeros
    function suma (int $num1, int $num2) : int {
        return $num1 + $num2;
    }

    function resta (int $num1, int $num2) : int {
        return $num1 - $num2;
    }

    function multiplicacion (int $num1, int $num2) : int {
        return $num1 * $num2;
    }

    function division (int $num1, int $num2) : int {
        
        $numero = -1;

        if($num2 != 0) {
            $numero = $num1 / $num2;
        }

        return $numero;
    }


?>