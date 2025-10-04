<?php 
//Mostrar la fecha si es correcta, es decir, si se han seleccionado los 3 datos.

if(isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["anio"])) {

    $intDia= $_GET["dia"]?:0;
    $intMes= $_GET["mes"]?:0;
    $intAnio= $_GET["anio"]?:0;
    $intMaxDias = 31;

    if($intDia!=0 && $intMes!=0 && $intAnio!=0) {
        switch($intMes) {
            case 2:
                $intMaxDias=28;
                if($intAnio%4===0 && $intAnio%400!=0) {
                    $intMaxDias=29;
                }
                break;
            case 4:
            case 6:
            case 9:
            case 11:
                $intMaxDias=30;
                break;
        }

        if($intDia<=$intMaxDias) {
            echo "Fecha seleccionada: $intDia/$intMes/$intAnio";
        } else {
            echo "La fecha seleccionada es incorrecta.";
        }
    } else {
        echo "Porfavor, seleccione una fecha.";
    }
} else {
    echo "No haz introducido ningun valor.";
}


?>