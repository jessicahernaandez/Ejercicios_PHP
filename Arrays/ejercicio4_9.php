<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

/*4.9.- Genera un tetris mediante una tabla de checkbox de 10x10, de tal
forma que elimine las filas que estén llenas y baje para abajo el resto*/

echo "<form action='ejercicio4_9.php' method='get'>";

    echo "<table>";

        for($fila = 10; $fila >= 1; $fila--){
            $contador=0;

            for($columna = 1; $columna <= 10; $columna++){
                if(isset($_GET['celda' . $fila . $columna])){
                    $contador++;
                }
            }

            echo "<tr>";
            for($columna = 1; $columna <= 10; $columna++){
                echo "<td>";
                echo "<label for='celda" . $fila . $columna . "'>";

                if(isset($_GET['celda' . $fila . $columna]) && $contador != 10){
                    echo "<input type='checkbox' name='celda" . $fila . $columna . "' checked />";
                } else {
                    echo "<input type='checkbox' name='celda" . $fila . $columna . "'>";
                }

                echo "</label>";
                echo "</td>";
            }
            echo "</tr>";
        }

    echo "</table>";

    echo "<p><input type='submit' value='enviar'></p>";

echo "</form>";

/*$posicionCelda = isset($_GET["celda".$fila.$columna]) ? $_GET["celda".$fila.$columna] : null;

echo "<table>";
for($fila = 1; $fila < 11; $fila++){
    echo "<tr>";
    for($columna = 1; $columna < 11; $columna++){
        
        if(isset($_GET['celda' . $fila . $columna])){ 
            echo "<td>";
            echo "<label for='celda" . $fila . $columna . "'>";
            echo "<input type='checkbox' name='celda" . $fila . $columna . "' checked />";
            echo "</label>";
            echo "</td>";
        }
    }
    echo "</tr>";
}
echo "</table>";*/
?>

</body>
</html>