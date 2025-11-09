<?php 

    //vamos a copiar los elementos que faltan de un array en otro
        $intArray[1] = 1;
        $intArray[7] = 2;
        $intArray[3] = 3;
        echo '<br /> array desordenado: ';
        print_r($intArray);

    echo "<br/>Mostrando el array con un for...<br/>";
    $intElementos = 0;
    for($intCont=0;$intElementos<count($intArray);$intCont++) {
        if(isset($intArray[$intCont])) {
            echo "$intCont => $intArray[$intCont]<br/>";
            $intElementos++;
        }
    }

    $intElementos = 0;
    //Ordenamos el array.
    for($intCont=0;$intElementos<count($intArray);$intCont++) {
        if(isset($intArray[$intCont])) {
            $intAux = $intArray[$intCont];
            unset($intArray[$intCont]);
            $intArray[$intCont] = $intAux;
            $intElementos++;
        }
    }

    echo "Array ordenado: <br>";
    print_r($intArray);
?>