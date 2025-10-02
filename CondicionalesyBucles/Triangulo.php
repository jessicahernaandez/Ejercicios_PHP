<?php 

$intTamanio = 4;

for($intFila = 1; $intFila <= $intTamanio; $intFila++) {
    $intLinea = '';
    for($intEstrella = 1; $intEstrella <= $intFila; $intEstrella++) {
        $intLinea = $intLinea . '* ';
    }

    echo $intLinea . " <br />";
}

for($intFila = $intTamanio - 1; $intFila >= 1; $intFila--) {
    $intLinea = '';
    for($intEstrella = 1; $intEstrella <= $intFila; $intEstrella++) {
        $intLinea = $intLinea . '* ';
    }

    echo $intLinea . " <br />";
}

?>