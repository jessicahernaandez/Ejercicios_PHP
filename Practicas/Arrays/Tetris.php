<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <?php

            $arrFilasIncompletas = [];
            $contFilasCompletas = 0;

            for($intFila=0;$intFila<10;$intFila++) {
                if(isset($_GET['tablero'][$intFila]) && count($_GET['tablero'][$intFila]) == 10) {
                    $contFilasCompletas++;
                } else {
                    $arrFilasIncompletas[] = $_GET['tablero'][$intFila] ?? [];
                }
            }

            $arrfilasVacias = array_fill(0,$contFilasCompletas,[]);
            $arrtableroFinal = array_merge($arrfilasVacias, $arrFilasIncompletas);

            echo "<table border=1>";
            for($intFila=0;$intFila<10;$intFila++) {
                echo "<tr>";
                for($intColumna=0;$intColumna<10;$intColumna++) {
                    $checked = isset($arrtableroFinal[$intFila][$intColumna]) ? "checked" : "";
                    echo "<td><input type='checkbox' name='tablero[$intFila][$intColumna]' $checked></td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
        <br>
        <input type="submit" name="enviar">
    </form>
</body>
</html>