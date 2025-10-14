<?php

    $strArrMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    $intValorMeses = [];

    //Recorremos el array para comprobar si existe un valor para cada mes.
    foreach($strArrMeses as $strMes) {
        if(isset($_GET[$strMes])) {
            $intValorMeses[$strMes] = (int) $_GET[$strMes];
        } else {
            $intValorMeses[$strMes] = 0;
        }
    }

    echo "<h3 style='text-align:center'>Diagrama de barras sobre la temperatura de los meses</h3>";
    echo "<table>";
    foreach($strArrMeses as $Mes) {
        echo "<tr>";
        echo "<td>$Mes<td>";
        echo "<td>";
        if($intValorMeses[$Mes] > 0) {
            for($intCont=0; $intCont < $intValorMeses[$Mes]; $intCont++) {
                echo "█";
            }
        } else {
            echo "<div style='color:gray'>Sin datos</div>";
        }
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

?>