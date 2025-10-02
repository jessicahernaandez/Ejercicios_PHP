<?php 
$intDia = $_GET["dia"];
$intMes = $_GET["mes"];
$intAnio = $_GET["anio"];

if (!$intDia || !$intMes || !$intAnio) {
    echo "Por favor, introduce todos los datos..";
} else {
    echo "Tu fecha seleccionada es: $intDia/$intMes/$intAnio";
}

?>