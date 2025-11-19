
<?php

    $titulo = "Temperatura";
    include("cabecera.inc.php");

    $arrMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    // Realiza un programa que pida la temperatura media que ha hecho en cada
    // mes de un determinado año y que muestre a continuación un diagrama de barras
    // horizontales con esos datos. Las barras del diagrama se pueden dibujar a base
    // de la concatenación de una imagen.
?>

<form action="graficoBarras.php" method="get">

    <table>
        <?php 
            foreach ($arrMeses as $arrMes) {
                echo "<tr>";
                echo "<td><label for=$arrMes>$arrMes</td>";
                echo "<td><input type='number' name='$arrMes'></td>";
                echo "<tr>";
            }
        ?>
    </table>

    <input type="submit" name="enviar">
    <?php 
         foreach ($arrMeses as $arrMes) {
                echo "<input type='hidden' name='arrMeses[]' value='$arrMes'>";
            }
    ?>
    
</form>

<?php 
    include("pie.inc.php");
?>