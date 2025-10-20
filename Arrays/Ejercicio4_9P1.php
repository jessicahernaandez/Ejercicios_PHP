<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tetris</title>
</head>
<body>
    <h3>¡Juego del Tetris!</h3>
    <form action="Ejercicio4_9P2.php" method="get"> 
        <table border='1'>
            <?php 
                for($intFila=0;$intFila<=10;$intFila++) {
                    echo "<tr>";
                    for($intColumna=0;$intColumna<=10;$intColumna++) {
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