<?php 

    // Funcion que averigue si un número es par
    function esPar(int $intNum) : bool {
        
        $esPar = $intNum % 2 == 0 ? true : false;

        return $esPar;
    }

    // Una función que devuelva un array de tamaño $intTam con números aleatorios 
    // comprendido entre $intMin y $intMax.
    function arrayAleatorio (int $intTam, int $intMin, int $intMax) : array {
        $numAleatorios = [];

        for($intCont=0;$intCont<$intTam;$intCont++) {
            $numAleatorios[$intCont] = rand($intMin,$intMax);
        }

        return $numAleatorios;
    }

    // Una función que reciba un $array por referencia y devuelva la cantidad de números 
    // pares que hay almacenados: arrayPares(array &$array): int
    function arrayPares (array &$array) : int {

        $intCantidadPares = 0;
        for($intCont=0;$intCont<count($array);$intCont++) {
            if($array[$intCont] % 2 == 0) {
                $intCantidadPares++;
            }
        }

        return $intCantidadPares;
    }




?>