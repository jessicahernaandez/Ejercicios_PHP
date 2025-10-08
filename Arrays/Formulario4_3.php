<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temperaturas</title>
</head>
<body>
    <h3>Ingresa la temperatura media de los siguientes meses: </h3> 
    <form action="Ejercicio4_3.php" method="get"> 
    <?php 

    $arrMeses=["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        foreach($arrMeses as $Mes) {
            echo "<p><label for='meses'>$Mes:</label>&nbsp;&nbsp;<input type='text' name='meses[]'></p>";
        }    
    ?>
    <p><input type="submit" name="enviar"></p>
    </form>
</body>
</html>