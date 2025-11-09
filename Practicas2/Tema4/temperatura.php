<?php 

    $strArrMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    echo "<table>";
    foreach($strArrMeses as $mes) {
        if(isset($_GET[$mes])) {
            $valorMes = $_GET[$mes];
            echo "<tr>";
            echo "<td>$mes</td>";
            echo "<td>";
            for($intCont=1;$intCont<=$valorMes;$intCont++) {
                 echo "█";
            }
            echo "<td>";
            echo "</tr>";
            
        }
    }
    echo "</table>";
?>