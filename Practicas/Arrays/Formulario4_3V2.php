<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Realiza un programa que pida la temperatura media que ha hecho en cada
    mes de un determinado año y que muestre a continuación un diagrama de barras
    horizontales con esos datos. Las barras del diagrama se pueden dibujar a base
    de la concatenación de una imagen.-->
    <form action="Ejercicio4_3V2.php" method="get">
        <table>

        <?php 

            //Array con los meses del año.
            $strArrMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

            foreach($strArrMeses as $strMes) {
                echo "<tr>";
                echo "<td><label for = '$strMes'>$strMes</label><td>";
                echo "<td><input type='text' name='$strMes'><td>";
                echo "</tr>";
            }
     
        ?>
        </table>

        <p><input type='submit' name='enviar'></p>
    </form>
</body>
</html>