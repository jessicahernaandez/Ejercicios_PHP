<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Juego del Ajedrez</h2>
    <h3>Introduce en que posicion se encuentra tu Alfil</h3>

    <ul>
    <li>Las filas se representan del <strong>1</strong> al <strong>8</strong>.</li>
    <li>Las columnas se representan de la <strong>"a"</strong> a la <strong>"h"</strong>.</li>
    </ul></br>

    <form action="Ejercicio4_8.php" method="get">
        <table>
        <tr><td><label for="fila">Introduce la fila: </label></td>
        <td><input type="text" name="fila"></td></tr>
        <tr><td><label for="columna">Introduce la columna: </label></td>
        <td><input type="text" name="columna"></td></tr>
        </table>

        <p><input type="submit" name="enviar"></p>
    </form>


</body>
</html>