<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tetris V2</title>
</head>
<body>
    <form method="get">
        <table border=1>
            <?php
            
                $contFilasIguales = 0;
                $arrFilasLlenas = [];

                //Compruebo cuantas filas iguales hay
                for($intFila=1;$intFila<=10;$intFila++) {
                    if(isset($_GET['tablero'][$intFila]) && count($_GET['tablero'][$intFila]) == 10) {
                        $arrFilasLlenas[] = $intFila;
                    } else {
                        $contFilasIguales++;
                    }
                }

                $filasVacias = 10 - $contFilasIguales;

                //Bucle para generar las filas vacias
                $intFilaActual=1;
                for($intFila=1;$intFila<=$filasVacias;$intFila++) {
                    echo "<tr>";
                    for($intColumna=1;$intColumna<=10;$intColumna++) {
                        echo "<td><input type='checkbox' name='tablero[$intFilaActual][$intColumna]'></td>";
                    }
                    echo "</tr>";
                    $intFilaActual++;
               }

               //Me genero las filas iguales
               for($intFila=1;$intFila<=10;$intFila++) {
                    echo "<tr>";
                    for($intColumna=1;$intColumna<=10;$intColumna++) {
                        if(!in_array($intFila,$arrFilasLlenas)) {
                            $checked = isset($_GET['tablero'][$intFila][$intColumna]) ? "checked" : "";
                            echo "<td><input type='checkbox' name='tablero[$intFilaActual][$intColumna]' $checked></td>";
                        }
                    }
                    echo "</tr>";
                    $intFilaActual++;              
               }
            ?>
        </table>
        <br>
        <input type="submit" name="enviar">
    </form>
</body>
</html>