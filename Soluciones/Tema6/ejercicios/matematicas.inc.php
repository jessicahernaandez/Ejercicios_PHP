<?php
    // devuelve la cantidad de dígitos de un número.
    function digitos(int $num): int{
        return strlen((string)$num);
    } 
    
    // devuelve el dígito que ocupa, empezando por la izquierda, la posición $pos.
    function digitoN(int $num, int $pos): int {
        $intArray=str_split($num);
        return($intArray[$pos-1]);
    }

    //le quita por detrás (derecha) $cant dígitos
    function quitaPorDetras(int $num, int $cant): int  {
        $intAux = 1; // Acumudador de la división
        for ($i = 1; $i <= $cant; $i++)
            $intAux *= 10;
        return $num / $intAux;
    }

    //le quita por delante (izquierda) $cant dígitos
    function quitaPorDelante(int $num, int $cant): int {
        $intAux = 1; // Acumudador de la división
        for ($i = 1; $i <= $cant; $i++)
            $intAux *= 10;
        return $num % $intAux;
    }

    //con lo visto en el siguiente tema
    function quitaPorDetras2(int $num, int $cant): int  {
        $chrArrAux = str_split((string)$num); // Acumudador de la división
        $strAux=''; //guarda el valor que quiero sacar

        for ($intCont = 0; $intCont < sizeof($chrArrAux) - $cant; $intCont++)
            $strAux .= $chrArrAux[$intCont];
        return (int)$strAux;
    }

    //usando funciones anteriores
    function quitaPorDelante2(int $num, int $cant): int {
        $strDevolver = ''; // valor devuelto
        $intDigitos = digitos($num); //lo guardo pq lo voy a usar varias veces

        if($intDigitos>$cant)
            for ($intDigito = $cant+1; $intDigito<=$intDigitos; $intDigito++)
                $strDevolver .= digitoN($num,$intDigito);

        return (int)$strDevolver;
    }
    
?>