<?php 

    // Crea una función que permite generar una letra aleatoria, mayúscula o minúscula.

    function generaLetraAleatoria () : string {

        $chrAleatorio = rand(ord('A'), ord('Z'));

        $arrFunciones = ["strtolower", "strtoupper"];

        $indiceRandom = rand(0,1);
            $chrAleatorioFinal = chr($chrAleatorio);
            $chrAleatorioFinal = $arrFunciones[$indiceRandom]($chrAleatorioFinal);
        
        return $chrAleatorioFinal;
    }

    echo "Letra Aleatoria: " . generaLetraAleatoria(). "<br />";
    echo "Otra letra aleatoria: " . generaLetraAleatoria() . "<br />";
?>