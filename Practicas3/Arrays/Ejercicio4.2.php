<?php 

    $titulo = "Triangulo mas";
    include("cabecera.inc.php");
    
    //Genera un programa que ordene un array según su número de índice

    $miArray = [4,3,2,1];
    echo "<pre>";
    print_r($miArray);
    echo "<pre>";
    echo "<br/>";

    $miArray[0] = 1;
    unset($miArray[3]);
    echo "<pre>";
    print_r($miArray);
    echo "<pre>";
    echo "<br/>";

    $miArray[6] = 10;
    $miArray[3] = 1;
    echo "<pre>";
    print_r($miArray);
    echo "<pre>";
    echo "<br/>";

    unset($miArray[1]);
    echo "<pre>";
    print_r($miArray);
    echo "<pre>";
    echo "<br/>";

    echo "Ordenado por numero de indices:";
    
    $intElementos = 0;
    for($intCont=0;$intElementos<count($miArray);$intCont++) {
        if(isset($miArray[$intCont])) {
            $intElementos++;
            $intAux = $miArray[$intCont];
            unset($miArray[$intCont]);
            $miArray[$intCont] = $intAux;
        }
    }

    echo "<pre>";
    print_r($miArray);
    echo "<pre>";
    echo "<br/>";


    include("pie.inc.php");
?>