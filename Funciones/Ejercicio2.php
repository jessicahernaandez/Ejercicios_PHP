<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
        include("parametrosVariables.php");

        // Primera funcion.
        $numMayor = mayor(3,6,10,23,17,54,1);

        echo "3,6,10,23,17,54,1";
        echo "<br>¿Cual es el numero mayor del conjunto anterior?: $numMayor";

        // Segunda funcion.
        $palabras = concatenar("Hola", "Luna", "Mundo");
        echo "<br>Cadena separado: $palabras";
    
    ?>
</body>
</html>