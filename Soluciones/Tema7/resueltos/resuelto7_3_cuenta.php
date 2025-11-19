<?php
    function cuentaSin(string $strCadena, int &$intLetras, int &$intPalabras){
        $strArrCadena = explode(' ', $strCadena);
        $intPalabras=count($strArrCadena);
        $intLetras=0;

        foreach($strArrCadena as $strPalabra){
            //$intAux = cuentaPalabra($strPalabra);
            //echo "La palabra $strPalabra tiene $intAux caracteres<br/>";
            //$intLetras+=$intAux;
            echo "La palabra $strPalabra tiene " . strlen($strPalabra) . " caracteres<br/>";
            $intLetras+=strlen($strPalabra);
        }
    }

    function cuentaPalabra(string &$strPalabra):int{
        $strArrCadena = str_split($strPalabra);
        $strPalabra='';
        $intCaracteres=0;

        foreach($strArrCadena as $chrCar)
            if(ctype_alpha($chrCar)){
                $strPalabra .= $chrCar;
                $intCaracteres++;
            }
       
        return ($intCaracteres);
    }

    function cuentaCon(string $strCadena, int &$intLetras, int &$intPalabras){
        $strArrPalabras = str_word_count($strCadena, 1);
        $intPalabras=count($strArrPalabras);
        $intLetras=0;

        foreach($strArrPalabras as $strPalabra){
            $intAux = strlen($strPalabra);
            echo "La palabra $strPalabra tiene $intAux caracteres<br/>";
            $intLetras+=$intAux;
        }
    }

    $titulo = "Resueltos 7.3 cuenta";
    include("../general/cabecera.inc.php");

    $intLetras=0; 
    $intPalabras=0;
    $strCadena="Hola esto$ es un@a prueba";
    echo "<h1>Se va a contar la frase \"$strCadena\"</h1> <h3>Sin str_word_count</h3>";
    cuentaSin($strCadena, $intLetras, $intPalabras);
    echo "El texto sin tiene $intPalabras palabras y $intLetras letras<br/><br/>";

    $intLetras=0; 
    $intPalabras=0;
    echo "<h3>Con str_word_count</h3>";
    cuentaCon($strCadena, $intLetras, $intPalabras);
    echo "El texto con tiene $intPalabras palabras y $intLetras letras";

    include("../general/pie.inc.html");
?>
    