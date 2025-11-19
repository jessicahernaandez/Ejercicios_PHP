<?php 

    $titulo = "GraficoBarras";
    include("cabecera.inc.php");

    if(isset($_GET["arrMeses"])){
        $arrMeses = $_GET["arrMeses"];

        echo "<table>";
        foreach($arrMeses as $mes) {
            $valorMes = $_GET[$mes] ?? 0;
            echo "<tr>";
            echo "<td><label for=$mes>$mes</td>";
            echo "<td>";
            if($valorMes != 0) {
                for($intCont=0;$intCont<=$valorMes;$intCont++) {
                    echo "█";
                }
            }
            echo "</td>";
            echo "<tr>";
        }
        echo "</table>";
    }

    include("pie.inc.php");

?>