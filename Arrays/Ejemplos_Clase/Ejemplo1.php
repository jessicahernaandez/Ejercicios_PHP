<?php 
    $strArrNotas = [9, 6, 5, 8];
    $strArrVariado = [9, 'Hola', 5.5, true];

    echo "Valores mostrados con 'echo': " . '<br />';
    echo $strArrNotas[0] . "<br />";
    echo $strArrNotas[1] . "<br />";
    echo $strArrNotas[2] . "<br />";
    echo $strArrNotas[3] . "<br />";
    echo $strArrNotas[4] . "<br />"; //da error de fuera de rango


    echo "Valores mostrados con 'var_dump': <br/>";
    var_dump($strArrNotas);
    echo "<br />";
    var_dump($strArrVariado);
    echo "<br />";
    echo "<br />";

    echo "Valores mostrados con 'print_r': <br/>";
    print_r($strArrNotas);
    echo "<br />";
    print_r($strArrVariado);
?>
