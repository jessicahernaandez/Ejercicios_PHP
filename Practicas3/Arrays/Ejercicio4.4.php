<?php 

    $arrNumAleatorios = [];

    for($intCont=0;$intCont<20;$intCont++) {
        $arrNumAleatorios[] = rand(1,100);
    }

    echo "20 numeros aleatorios:<br /> entre 1 y 100";
    for($intCont= 0;$intCont< 20;$intCont++) {
        echo ($intCont + 1) . ": $arrNumAleatorios[$intCont]<br/>";
    }

    //Recorro el array, separo los pares de los impares.
    $arrPares = [];
    $arrImpares = [];
    for($intCont=0;$intCont<count($arrNumAleatorios);$intCont++) {
        if($arrNumAleatorios[$intCont] % 2 == 0) {
            $arrPares[] = $arrNumAleatorios[$intCont];
        } else {
            $arrImpares[] = $arrNumAleatorios[$intCont];
        }
    }

    echo "<br><br>Array ordenado, los pares en las primeras posiciones y los impares en las ultimas posiciones:<br>";
    $arrNumOrdenados = array_merge($arrPares, $arrImpares);
    for($intCont= 0;$intCont<count($arrNumOrdenados);$intCont++) {
        echo ($intCont + 1) . ": $arrNumOrdenados[$intCont]<br/>";
    }


?>