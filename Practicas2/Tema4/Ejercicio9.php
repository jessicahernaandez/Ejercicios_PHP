<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action ="" method="get">
        <table border='1'>
            <?php 
                $tableroAux = [];
                for($intFila=0;$intFila<10;$intFila++) {
                    echo "<tr>";
                    for($intColumna=0;$intColumna<10;$intColumna++) {
                        $checked = isset($_GET["marcados"][$intFila][$intColumna]) ? "checked" : "";
                        $valor = isset($_GET["marcados"][$intFila][$intColumna]) ? 1 : 0;
                        echo "<td><input type='checkbox' name='marcados[$intFila][$intColumna]' $checked></td>";
                        $tableroAux[$intFila][$intColumna] = $valor;
                    }
                    echo "</tr>";
                }
            ?>
        </table>
        <br />
        <input type="submit" name="enviar">
        <br />
        <br />
    </form>

    <?php 

        $arrFilaLlena = [1,1,1,1,1,1,1,1,1,1];
        $punteroLLeno = -1;

        //Vamos a recorrer el array Auxiliar desde abajo, para encontrar la ukltima fila llena.
        for($intFila=9;$intFila>=0;$intFila--) {
            if($punteroLLeno == -1 && $tableroAux[$intFila] == $arrFilaLlena) {
                $punteroLLeno = $intFila;
            }
        }

        //Vamos a recorrer el tablero auxiliar desde la ultima fila llena -1, preguntamos si la fila esta vacia,
        //de ser asi, la intercambiamos con la fila llena y puntero de fila llena disminuye.
        for($intFila=$punteroLLeno-1;$intFila>=0;$intFila--) {
            if($tableroAux[$intFila] != $arrFilaLlena) {
                $tableroAux[$punteroLLeno] = $tableroAux[$intFila];
                $punteroLLeno--;
            }
        }

        //Llenamos desde $punteroLleno hacia arriba, las filas a 0.
        for($intFila=$punteroLLeno;$intFila>=0;$intFila--) {
            $tableroAux[$intFila] = array_fill(0,10,0);
        }

        //Mostramos
        echo "<table border=1>";
        for($intFila=0;$intFila<10;$intFila++) {
            echo "<tr>";
            for($intColumna=0;$intColumna<10;$intColumna++) {
                $checked = $tableroAux[$intFila][$intColumna] == 1 ? "checked" : "";
                echo "<td><input type='checkbox' name='marcados[$intFila][$intColumna]' $checked></td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        echo "<pre>";
        print_r($_GET["marcados"]);
        echo "</pre>";
        echo "<pre>";
        print_r($tableroAux);
        echo "</pre>";

    ?>
</body>
</html>