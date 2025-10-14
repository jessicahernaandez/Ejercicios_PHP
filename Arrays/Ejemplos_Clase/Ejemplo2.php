<?php
    $intArrNotas = [1, 2, 3, 4];
    $chrArrUno = ['a', 'b', 'c'];
    $chrArrDos = ['d', 'e', 'f'];

    print_r($intArrNotas);
    var_dump($intArrNotas);
    
    echo 'Número elementos: ' . count($intArrNotas) . '<br /><br />';
    $intArrOtrasNotas = array_merge($intArrNotas, [5,6,7,8]);
    echo 'Número elementos de OtrasNotas: ' . count($intArrOtrasNotas) . '<br /> OtrasNotas: ';
    print_r($intArrOtrasNotas);
    echo '<br /><br /> ArrayUno: ';
    print_r($chrArrUno);
    echo '<br /> chrArrDos: ';
    print_r($chrArrDos);
    echo '><br /> array_merge(chrArrUno,chrArrDos) -> ArrayTres: ';
    $chrArrTres = array_merge($chrArrUno,$chrArrDos);
    print_r($chrArrTres);
    echo '<br /> ArrayTres con for [';

    for($intLetra=0;$intLetra<count($chrArrTres);$intLetra++) {
        echo " " . $chrArrTres[$intLetra] . ",";
    }

    echo "]";

    //Eliminamos elementos
    unset($chrArrTres[2]);
    unset($chrArrTres[5]);
    unset($chrArrTres[12]); //No hace nada.

    echo "<br /><br /> Array 3 sin algunos elementos: ";
    print_r($chrArrTres);
    echo "<br /> Numero de elementos: " . count($chrArrTres) . "<br />";

    echo "Cambio de elemento e insercion de uno nuevo <br />";
    $chrArrTres[1]='y';
    $chrArrTres[2]='x'; //Mete la posicion 2 al final.
    print_r($chrArrTres);
    echo " <br /> Numero de elementos: " . count($chrArrTres) . "<br />";

    echo "Utilizamos merge para evitar los huecos en el array <br />";
    $chrArrTres = array_merge($chrArrTres);
    print_r($chrArrTres);
    echo "<br /> Numero de elementos: " . count($chrArrTres);






?>