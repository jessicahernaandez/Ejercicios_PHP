<?php 

    $strArrMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
    'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    $intValorMeses = [];

    //Guardamos el valor de los meses si existen.
    foreach($strArrMeses as $strMes) {
        if(isset($_GET[$strMes])) {
            $intValorMeses[$strMes] = $_GET[$strMes];
        } else {
            $intValorMeses[$strMes] = 0;
        }
    }

    echo "<h3 style='text-align:center'>Diagrama de barras sobre las temperaturas 2025</h3>";
    echo "<table>";

    foreach($strArrMeses as $strMes) {
        echo "<tr>";
        echo "<td>$strMes</td>";
        echo "<td style='background-image:url(img/rojo.jpg); height:20px;'>";
        if($intValorMeses[$strMes] > 0) {
            $in</trtTemperatura = $intValorMeses[$strMes];
            for($intCont=0;$intCont<$intTemperatura;$intCont++) {   
                echo "<img src='img/morado.jpg' alt='█' style='width:10px; height:20px; display:inline-block;'>";
            }
        }
        echo "</td>";
        echo ">";
    }

    echo "</table>";




?>