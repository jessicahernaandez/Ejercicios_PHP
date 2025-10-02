<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action = "Ejercicio3_login.php" method="get">
        
        <!--Primer desplegable-->
        <select name="dia" id="dia">
            <option value='0'>Día</option>
            <?php
               for($intCont=1;$intCont <= 31; $intCont++) 
                echo "<option value= '$intCont'>$intCont</option>";
            ?>
        </select>

        <!--Segundo desplegable-->
        <label for="mes">Mes: </label>
        <select name="mes" id="mes">
        <?php     
            for($intCont=1; $intCont<=12; $intCont++) 
                echo "<option value='$intCont'>$intCont</option>";         
        ?>
        </select>

        <!--Tercer desplegable-->
        <label for="anio">Anio: </label>
        <select name="anio" id="anio">
            <?php 
                for($intCont=1990;$intCont <=2025;$intCont++)
                    echo "<option value='$intCont'>$intCont</option>";
            ?>
        </select> 
        
        <input type="submit" name="Enviar">
</form> 
</body>
</html>