<?php 

    // Funcion que devuelva el mayor de todos los números recibidos como parámetros.
    function mayor(... $intArrNumeros) : int {
        $intMayor = 0;

        foreach($intArrNumeros as $indice => $valor) {
            if($valor > $intMayor) {
                $intMayor = $valor;
            }
        }

        return $intMayor;
    }

    // Una función que concatene todos los parámetros recibidos separándolos con un espacio: 
    // function concatenar(...$palabras) : string. 
    function concatenar(... $palabras) : string {

        $strPalabras = implode(' ', $palabras);

        return $strPalabras;
    }


?>