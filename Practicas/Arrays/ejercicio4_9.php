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

    //Primero entra en la fila
        for($fila = 10; $fila >= 1; $fila--){
            $contador=0;

            //Después va mirando cada casilla de la fila.
            for($columna = 1; $columna <= 10; $columna++){
                if(isset($_GET['celda' . $fila . $columna])){//Si existe es que está marcada. Entonces entra al if e incrementa el contador.
                    $contador++;
                }
            }

            //Vuelve a mirar cada casilla de la fila.
            echo "<tr>";
            for($columna = 1; $columna <= 10; $columna++){
                echo "<td>";
                echo "<label for='celda" . $fila . $columna . "'>";

                //Si la casilla existe y el contador no es 10, es que esa fila no está completa pero sí tiene casillas marcadas, por eso las pinta con checked.
                if(isset($_GET['celda' . $fila . $columna]) && $contador != 10){
                    echo "<input type='checkbox' name='celda" . $fila . $columna . "' checked />";
                //Si no, es que la casilla no existe o el contador es 10, entonces pinta la casilla o la fila entera de blanco.
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

?>

</body>
</html>