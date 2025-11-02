<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>¡Juego del Tetris!</h3>

    <form method="get">
    <table border=1>
    <?php 
        // Como son checkboxes con los que vamos a trabajar, una vez que los marcamos, en $GET
        // solo se envian ellos, por eso si estan en $_GET los vamos a dejar marcados.

        $filasIguales = 0;
        $filasCompletas = [];

        for($intFila=1;$intFila<=10;$intFila++) {
            if(isset($_GET['tablero'][$intFila]) && count($_GET['tablero'][$intFila]) == 10) {
                $filasCompletas[] = $intFila;
            } else {
                $filasIguales++;
            }
        }

        $filasVacias = count($filasCompletas);

        // Genero las filas vacias.
        $filaActual = 1;
        for($intFila=1;$intFila<=$filasVacias;$intFila++) {
            echo "<tr>";
            for($intColumna=1;$intColumna<=10;$intColumna++) {
                echo "<td><input type='checkbox' name='tablero[$filaActual][$intColumna]'></td>";
            }
            echo "</tr>";
            $filaActual++;
        }

        //Genero las filas iguales, sin tomar en cuenta las filas donde las casillas tengan todas las columnas completas.
        for($intFila=1;$intFila<=10;$intFila++) {
            if(!in_array($intFila, $filasCompletas)) {
                echo "<tr>";
                for($intColumna=1;$intColumna<=10;$intColumna++) {
                    $checked = isset($_GET['tablero'][$intFila][$intColumna]) ? "checked" : "";
                    echo "<td><input type='checkbox' name='tablero[$filaActual][$intColumna]' $checked></td>";
                }
            }
            echo "</tr>";
            $filaActual++;
        }
    ?>

    </table>
    <br>
    <input type="submit" name="enviar">
    </form>
</body>
</html>