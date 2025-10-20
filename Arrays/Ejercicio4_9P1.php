<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tetris</title>
</head>
<body>
    <h3>¡Juego del Tetris!</h3>
    <form action="Ejercicio4_9V2.php" method="get"> 
        <table style="border: 1px solid black;">
            <?php 
                for($intFila=1;$intFila<=10;$intFila++) {
                    echo "<tr>";
                    for($intColumna=1;$intColumna<=10;$intColumna++) {
                        echo "<td><input type='checkbox' name='marcado[$intFila][$intColumna]'></td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>
        <br>
        <input type="submit" name="enviar">
    </form>
</body>
</html>