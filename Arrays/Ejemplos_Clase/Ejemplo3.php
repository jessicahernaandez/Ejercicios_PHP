<?php 
    $strCadena = 'Hola Mundo';
    echo $strCadena . '<br />';
    $strCadena[2] = 'X';
    echo $strCadena . '<br />';
    echo "Posicion 0: " . $strCadena[0] . '<br />';
    echo 'cadena como array (caracter por caracter) ';
    print_r(str_split($strCadena));
    echo '<br /> cadena como array por palabras sin espacios';
    print_r(preg_split('/[\s,]+/',$strCadena));

?>


