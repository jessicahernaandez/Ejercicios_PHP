<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Ejercicio1.php" method="get">
        <select name="dia" id="dia">
        <!--Como queremos que dentro de la etiqueta desplegable salga la palabra "Dia", no ponemos ningun label
        Con esto, obligamos al usuario a que seleccion un dia.-->
            <option value="0">Dia</option>

            <?php 
               for($intCont=1;$intCont<=31;$intCont++) {
                echo "<option value='$intCont'>$intCont</option>";
               }
            ?>
        </select>

        <!--MESES-->
        <label for="mes">Mes</label>
        <select name="mes" id="mes">
            
            <?php 
               for($intCont=1;$intCont<=12;$intCont++) {
                echo "<option value='$intCont'>$intCont</option>";
               }
            ?>    
        </select>

        <!--ANIOS-->
        <label for="anio">Año</label>
        <select name="anio" id="anio">
            <?php 
               for($intCont=1990; $intCont <=2025; $intCont++) {
                echo "<option value='$intCont'>$intCont</option>";
               }
            ?>
        </select>

        
        &nbsp;<input type="submit" name="enviar">
    </form> 
</body>
</html>