<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tres en Raya</title>
</head>
<body>
    <h3>¡Juego de tres en raya!</h3>
    <p>Tienes 3 fichas para mover.</p>
    <table>
    <form action="TresEnRaya.php" method="get">
        <tr>
        <td><label for="fila">Introduce una fila: </label></td>
            <td><input type="text" name="fila"></td>
        </tr>
        <tr>
        <td><label for="columna">Introduce una columna: </label></td>
            <td><input type="text" name="columna"></td>
        </tr>
        <tr>
        <td><label for="destino">Introduce el destino: </label></td>
            <td><input type="text" name="destino"></td>
        </tr>
    </table><br>
    <?php 
        echo "<table style='border: 1px solid black;'>";
        for($intFilas=1;$intFilas<=3;$intFilas++) {
            echo "<tr>";
            for($intColumnas=1;$intColumnas<=3;$intColumnas++) {
                $intColor='white';
                if(($intFilas + $intColumnas) % 2 == 0) {
                    $intColor='black';
                }
                echo "<td style='width: 50px; height: 50px; text-align:center;background-color:$intColor;'></td>";
            }
            echo "</tr>";
        }
        
    ?>
</body>
</html>