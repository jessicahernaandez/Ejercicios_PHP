<?php 

    $intArrNumeros = [];

    for($intCont=0;$intCont<20;$intCont++) {
        $intArrNumeros[$intCont] = rand(0,100);
    }

    echo "Numeros Aleatorios:<br />";
    foreach($intArrNumeros as $key => $valor) {
        echo "$key: $valor<br/>";
    }

    $arrPares = [];
    $arrImpares = [];

    for($intCont=0;$intCont<20;$intCont++) {
        if($intArrNumeros[$intCont] % 2 == 0) {
            $arrPares[] = $intArrNumeros[$intCont];
        } else {
            $arrImpares[] = $intArrNumeros[$intCont];
        }
    }

    $intArrayOrdenado = array_merge($arrPares,$arrImpares);

    echo "<br />Numeros ordenados, los pares en las primera posiciones y los impares en las ultimas:<br />";
    foreach($intArrayOrdenado as $key => $valor) {
        echo "$key: $valor<br/>";
    }

?>