<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tetris V2</title>
</head>
<body>
    <?php 
        echo "<table border>";
        for($intFila=0;$intFila<10;$intFila++) {
            echo "<tr>";
            for($intColumna=0;$intColumna<10;$intColumna++) {
                echo "<td><input type='checkbox' name='tablero[$intFila][$intColumna]'></td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        $punteroFilaLLena = 0;
        $punteroFilaAnterior = 0;

        $intArrayAux = [1,1,1,1,1,1,1,1,1,1];

        for($intFila=9;$intFila<=0;$intFila--) {
            if(isset($_GET['tablero'][$intFila]) && count($_GET['tablero'][$intFila]) == 10) {
                $punteroFilaLLena = $intFila;
                $punteroFilaAnterior = $intFila - 1;


            } else {
                
            }
        }



    ?>
</body>
</html>