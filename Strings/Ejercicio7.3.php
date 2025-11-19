<?php 

    // 7.3.- A partir de una frase con palabras sólo separadas por espacios, devolver
    // 🞚 Letras totales y cantidad de palabras
    // 🞚 Una línea por cada palabra indicando su tamaño
    // Realiza el ejercicio sin usar la función str_word_count y usándola.

    function devuelveTamaño (string $cadena) : void { // Ejemplo : "Luna es una perrita bonita";

        $cadena = strtolower($cadena);
        //Letras totales
        $numLetras = 0;

        //Comprobamos cuantas letras tiene la cadena.
        for($intCont=0;$intCont<strlen($cadena);$intCont++) {
            if(!ctype_space($cadena[$intCont]) && !ctype_digit($cadena[$intCont]) && !ctype_punct($cadena[$intCont])) {
                $numLetras++;
            } 
        }

        echo "Cadena: '$cadena' <br />";
        echo "*Letras totales: $numLetras <br /><br />";

        //Comprobar la cantidad de palabras.
        $arrPalabras = explode(" ", $cadena);

        $cantidadPalabras = count($arrPalabras);

        echo "*Cantidad de palabras: $cantidadPalabras <br />";

        //Mostrar cada palabra indicando su tamaño.
        "*Palabras en la cadena y tu tamaño: <br />";
        foreach($arrPalabras as $palabra) {
            $palabra = trim($palabra);
            $tamañoPalabra = strlen($palabra);
            echo "-$palabra: $tamañoPalabra letras<br />";
        }

    }

    devuelveTamaño("Luna es una perrita bonita");

?>