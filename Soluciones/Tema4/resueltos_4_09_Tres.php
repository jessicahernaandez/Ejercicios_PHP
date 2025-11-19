<html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.09</title>
        <style>
            table {
                border-collapse: collapse;
                margin: 20px;
            }
            td {
                padding: 5px;
            }
            table, th, td {
                border: 1px solid blue;
            }
        </style>
    </head>

    <body>
    <h1 style="text-align:center;">Tetris</h1>
    <form action="resueltos_4_09_Tres.php" >
        <table>
            <?php
            define("DIMENSION",10);
            $pixel = $_GET['pixel'];
            for ($intFila = 0; $intFila < DIMENSION; $intFila++) {
                echo "\n<tr>";
                for ($intColumna = 0; $intColumna < DIMENSION; $intColumna++) {
                    // Generamos un nombre único para cada checkbox";
                    $intAux = $pixel[$intFila][$intColumna]??0;
                    $pixel[$intFila][$intColumna]=$intAux?true:false;
                    $intAux=$intAux?'checked':'';
                    echo "<td><input type='checkbox' name='pixel[$intFila][$intColumna]' $intAux></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
        <input type="submit" value="Enviar">
    </form>
    <?php
        //paso por todas las filas para quitar las rellenas
        for ($intFila = DIMENSION-1; $intFila > 0; $intFila--) {
            //$intAcumulador = 0;
            if(array_sum($pixel[$intFila])==DIMENSION) {
                $intFilaAux=$intFila; //marco la primera fila a eliminar
                for (; $intFila >= 0; $intFila--) {// paso por las filas superiores a ver si puedo mover alguna
                    for (; $intFila > 0 && (array_sum($pixel[$intFila]) == DIMENSION ||
                        array_sum($pixel[$intFila]) == 0); $intFila--) ;// paso por las filas hasta localizar una no vacía ni llena
                    if($intFila >= 0) { // si he localizado una fila no vacía
                        $pixel[$intFilaAux--] = $pixel[$intFila]; // meto la fila y cambio de fila a añadir
                    }
                }
                for (; $intFilaAux >= 0; $intFilaAux--) // añado tantas filas como no haya rellenado
                    for ($intCont = 0; $intCont < DIMENSION; $intCont++) // relleno las columnas
                        $pixel[$intFilaAux][$intCont] = false;
            }
        }

        //pinta la matriz
        echo "\ntamaño de la tabla ".sizeof($pixel)."<table>";
        for ($intFila = 0; $intFila < DIMENSION; $intFila++) {
            echo "\n<tr>";
            for ($intColumna = 0; $intColumna < DIMENSION; $intColumna++) {
                // Generamos un nombre único para cada checkbox";
                $intAux = $pixel[$intFila][$intColumna]??0;
                $intAux=$intAux?'checked':'';
                echo "<td><input type='checkbox' name='pixel[$intFila][$intColumna]' $intAux></td>";
            }
            echo "</tr>";
        }
        echo "\n</table>";
    ?>
    </body>
</html>
