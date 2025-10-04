<?php 
    $intTamanio=10;

    for($intFila=1;$intFila<=$intTamanio;$intFila++) {
        for($intColumna=1;$intColumna<=$intTamanio;$intColumna++) {

            if($intFila==1 || $intFila==$intTamanio || $intColumna==1 || $intColumna==$intTamanio) {
                echo "*";
            } else {
                echo "&nbsp;&nbsp;";
            }
        }

        echo "<br/>";
    }
?>