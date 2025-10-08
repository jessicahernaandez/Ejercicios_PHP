<?php 
    //Genera un programa que ordene un array según su número de índice
    $intArrNotas = [3,5,8,10,5,3];

    echo "Array inicial:" . "<br />";
    print_r($intArrNotas);
    echo "<br />";
    echo "<br />";

    //Nos cargamos 2 valores, los indices (claves, quedan desordenados)
    unset($intArrNotas[3]);
    unset($intArrNotas[0]);

    echo "Array sin los dos valores eliminador: " . "<br />";
    print_r($intArrNotas);
    echo "<br />";
    echo "<br />";

    //Insertamos dos notas mas
    echo "Ingresando dos notas mas..." . "<br/>";
    $intArrNotas[10] = 1;
    $intArrNotas[3] = 9;
    print_r($intArrNotas);
    echo "<br />";
    echo "<br />";

    //Empezamos a ordenar los indices del array
    //Primero -> Vamos a listar el array ordenado
    echo "Listamos el array ordenado con un for. <br/>";
    for($intCont=0, $intElementos=0; $intElementos <count($intArrNotas); $intCont++){
        if(isset($intArrNotas[$intCont])) {
            $intElementos++;
            echo "[$intCont] => " . $intArrNotas[$intCont]. ",&nbsp;&nbsp;&nbsp;";
        }
    }

    echo "<br/> <br/>Pero el array sigue desordenado: <br/>";
    print_r($intArrNotas);
    
    //Ordenamos los indices del array utilizando una variable auxiliar
    for($intCont=0,$intElementos=0;$intElementos<count($intArrNotas);$intCont++) {
        if(isset($intArrNotas[$intCont])) {
            $intElementos++;
            $intAux=$intArrNotas[$intCont];
            unset($intArrNotas[$intCont]);
            $intArrNotas[$intCont] = $intAux;
        }
    }

    echo "<br /><br/> Array ordenado:<br/> ";
    print_r($intArrNotas);
?>