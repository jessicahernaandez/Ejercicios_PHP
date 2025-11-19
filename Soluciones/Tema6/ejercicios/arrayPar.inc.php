<?php
    function esPar(int $intNum): bool{
        return $intNum%2==0?true:false;
    }

    function arrayAleatorio(int $intTam, int $intMin, int $intMax) : array{
        $intArray =[];

        for($intCont=0; $intCont<$intTam; $intCont++)
            $intArray[]=rand($intMin, $intMax);

        return $intArray;
    }

    function arrayPares(array &$intArray): int{
        $intPares=0;
        for($intCont=0; $intCont<count($intArray); $intCont++)
            $intPares += esPar($intArray[$intCont])?1:0;

        return $intPares;
    }
?>