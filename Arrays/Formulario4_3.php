<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Ejercicio4_3.php" method="get">
        <table>
            <?php 
                $strArrMeses= ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
                'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                foreach($strArrMeses as $strMes) {
                    echo "<tr>";
                    echo "<td><label for='$strMes'>$strMes: </label><td/>";
                    echo "<td><input type='text' name='$strMes'><td/>";
                    echo "<tr/>";
                }
            ?>       
        </table>
        
        <p><input type='submit' name='enviar'></p>
    </form>
</body>
</html>