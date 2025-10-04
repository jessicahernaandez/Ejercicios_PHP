<?php 
    $intTamanio=8;

    for($intFila=1;$intFila<=$intTamanio;$intFila++) {

        for($intEspacios=1;$intEspacios<=($intTamanio-$intFila);$intEspacios++) {
            echo "&nbsp;&nbsp;";
        }

        echo "*";

        if ($intFila>1) {
            for($intDentro=1;$intDentro<=(2 * $intFila - 3);$intDentro++) {
                echo "&nbsp;&nbsp;";
            }

            echo "*";
        }

        echo '<br />';
    }

    for($intFila=$intTamanio-1;$intFila>=1;$intFila--) {
        
        for($intEspacios=($intTamanio-$intFila);$intEspacios>=1;$intEspacios--) {
            echo "&nbsp;&nbsp;";
        }

        echo "*";

        if($intFila>1) {
            for($intDentro=1;$intDentro<=(2* $intFila - 3); $intDentro++) {
                echo "&nbsp;&nbsp;";
            }

            echo "*";
        }

        echo "<br/>";
    }


?>














