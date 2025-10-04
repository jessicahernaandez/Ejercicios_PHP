<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Ejercicio1V2.php" method="get">
        
        <!--DIAS-->
        <select name="dia" id="dia">
            <option value="0">Dia</option>
            <?php 
                for($intCont=1;$intCont<=31;$intCont++) {
                    echo "<option value='$intCont' ". ($intCont ==$intDia ? 'selected':' ') .">$intCont</option>";
                }
            ?>
        </select>

        <!--MESES-->
        <label for="mes">Mes</label>
        <select name="mes" id="mes">
            <?php 
                for($intCont=1;$intCont<=12;$intCont++) {
                    echo "<option value='$intCont' ". ($intCont==$intMes ? 'selected': '') . ">$intCont</option>";
                }
            ?>
        </select>

        <!--ANIOS-->
        <label for="anio">Año</label>
        <select name="anio" id="anio">
            <?php 
                for($intCont=1990;$intCont<=2025;$intCont++) {
                    echo "<option value='$intCont' ". ($intCont==$intAnio ? 'selected': '') .">$intCont</option>";
                }
            ?>
        </select>

        &nbsp;<input type="submit" name="enviar">
    </form>

    <!--CODIGO PHP-->
    <?php 
        if (isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["anio"])) {

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
                }

                if($intDia<=$intMaxDias) {
                    echo "Tu fecha seleccionada: $intDia/$intMes/$intAnio";
                } else {
                    echo "La fecha seleccionada es incorrecta.";
                }
            } else {
                echo "Selecciona dia, fecha y año.";
            }
        } else {
            echo "No has seleccionado una fecha";
        }
    ?>

</body>
</html>





























