<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="temperatura.php" method="get">
        <?php 
            $strArrMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

            echo "<table>";
            foreach($strArrMeses as $mes) {
                echo "<tr>";
                echo "<td><label for='$mes'>$mes:</label></td><td><input type='text' name='$mes'></td>";
                echo "</tr>";
            }

            echo "</table>";
        ?>
        <input type="submit" name="enviar">
    </form>
</body>
</html>