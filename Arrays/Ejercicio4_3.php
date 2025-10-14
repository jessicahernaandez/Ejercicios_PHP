<?php 

    $strArrMeses= ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    $strValoresMeses = [];

    //Recorremos cada mes y guardamos el valor si existe
    foreach($strArrMeses as $strMes) {
        if(isset($_GET[$strMes])) {
            $strValoresMeses[$strMes] = (int)$_GET[$strMes];
        } else {
            $strValoresMeses[$strMes] = 0;

        }
    }

    echo "<h2>Diagrama de barras horizontales</h2>";
    echo "<table>";

    foreach($strArrMeses as $strMes) {
        echo "<tr>";
        echo "<td>$strMes: </td>";
        echo "<td>";
        
        if($strValoresMeses[$strMes] > 0) {
            $intAux= $strValoresMeses[$strMes] * 1;
            for($intCont=0;$intCont<$intAux;$intCont++) {
                echo "█";
            }
        } else {
            echo "<span style='color:gray;'>Sin datos</span>";
        }

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
?>