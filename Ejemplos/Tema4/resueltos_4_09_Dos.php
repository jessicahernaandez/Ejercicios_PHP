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
    <form action="resueltos_4_09_Dos.php" >
        <table>
            <?php
            $pixel = $_GET['pixel'];
            echo "<pre>";
            print_r($pixel);
            echo "</pre>";
            for ($intFila = 0; $intFila < 10; $intFila++) {
                echo "\n<tr>";
                for ($intColumna = 0; $intColumna < 10; $intColumna++) {
                    // Generamos un nombre único para cada checkbox";
                    $intAux = $pixel[$intFila][$intColumna]??0;
                    $pixel[$intFila][$intColumna]=$intAux?true:false;
                    $intAux=$intAux?'checked':'';
                    echo "<pre>";
            print_r($intAux);
            echo "</pre>";
                    echo "<td><input type='checkbox' name='pixel[$intFila][$intColumna]' $intAux></td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
        <input type="submit" value="Enviar">
    </form>
    <?php
        for ($intFila = 0; $intFila < 10; $intFila++) {
            $intAcumulador = 0;
            for ($intColumna = 0; $pixel[$intFila][$intColumna] && $intColumna < 10; $intColumna++)
                $intAcumulador += $pixel[$intFila][$intColumna] ? 1 : 0;
            if ($intAcumulador == 10) {
                unset($pixel[$intFila]);// me cargo la fila
                for ($intFilaAux = $intFila; $intFilaAux > 0; $intFilaAux--)//bajo las filas anteriores hasta estar en la primera
                    $pixel[$intFilaAux] = $pixel[$intFilaAux-1];
                for ($intCont = 0; $intCont < 10; $intCont++) //añado una fila inicial
                    $pixel[0][$intCont] = false;
            }
        }

        //pinta la matriz
        echo "\ntamaño de la tabla ".sizeof($pixel)."<table>";
        for ($intFila = 0; $intFila < sizeof($pixel); $intFila++) {
            echo "\n<tr>";
            for ($intColumna = 0; $intColumna < 10; $intColumna++) {
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
