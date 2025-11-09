<?php 
    
    $intArrNumeros = [];

    for($intCont=0;$intCont<20;$intCont++) {
        $intArrNumeros[$intCont] = rand(0,100);
    }

    echo "Numeros Aleatorios:<br />";
    foreach($intArrNumeros as $key => $valor) {
        echo "$key: $valor<br/>";
    }

    $intInicio = 0;
    $intFinal = count($intArrNumeros) - 1;

    while($intInicio < $intFinal) {
        if($intArrNumeros[$intFinal] % 2 != 0) {
            $intFinal--;
        } else {
            $intAux = $intArrNumeros[$intFinal];
            $intArrNumeros[$intFinal] = $intArrNumeros[$intInicio];
            $intArrNumeros[$intInicio] = $intAux;
            $intInicio++;
        }
    }

    echo "<br />Numeros Aleatorios ordenados. Los pares en las primeras posiciones:<br />";
    foreach($intArrNumeros as $key => $valor) {
        echo "$key: $valor<br/>";
    }

?>