
<?php 

//La funcion isset nos permite poder verificar si una variable 
//esta vacia o es null.

if (isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["anio"])) {
    //Una vez comprobadas que las variables tienen valor, les asiganmos el valor:
    $intDia = $_GET["dia"]?:0;
    $intMes = $_GET["mes"]?:0;
    $intAnio = $_GET["anio"]?:0;
    $intMaxDias = 31;

    //Este if nos ayuda a verificar que el numero de dias coincida con su respectivo mes.
    if($intDia!=0 && $intMes!=0 && $intAnio!=0) {
        switch($intMes) {
            case 4:
            case 6:
            case 9:
            case 11:
                $intMaxDias = 30;
                break;
            case 2:
                $intMaxDias = 28;
                break;    
        }

        if($intMaxDias>=$intDia) 
            echo " <br /> Tu fecha es: $intDia/$intMes/$intAnio";
        else 
            echo "La fecha no es correcta";
   
    } else 
        echo "Tienes que introducir el dia, mes y anio.";
    
} else 
    echo "No has introducido la fecha.";
?>
