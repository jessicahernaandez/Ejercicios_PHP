<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tres en Raya</title> 
    <?php 
    //El input oculto tendra el nombre de 'tablero' y el valor sera una cadena de texto 
    //que tendremos que pasar en la variable que tenemos el tablero.
        if(!isset($_GET['tablero'])) {
            $tablero = [
                ["-", "-", "-"],
                ["-", "-", "-"],
                ["-", "-", "-"]
            ];
        } else {
            //Como queremos hacer una conversion de cadena a array, utilizamos explode.
            //La cadena de texto separa cada fila con '|';
            $filas = explode("|", $_GET['tablero']);
            $tablero = [];
            foreach($filas as $filaCadena) {
                $tablero[] = str_split($filaCadena);
            }
        }

        $cuantasX = 0;
        //Ahora que ya tengo el tablero en array trabajo sobre él.
        if(isset($_GET['filaDestino']) && isset($_GET['columnaDestino'])) {
            $filaDestino = $_GET['filaDestino'] -1;
            $columnaDestino = $_GET['columnaDestino'] -1;

            if ($tablero[$filaDestino][$columnaDestino] == '-') {
                $tablero[$filaDestino][$columnaDestino] = 'X';
            } else {
                echo "<p>Esa posición está ocupada</p>";
            }
        } else {
            echo "<p>Esa posicion no existe</p>"; //MIRAR
        }

        //Compruebo cuantas 'X' hay.
        $cuantasX = 0;
        for($fila = 0; $fila < 3; $fila++) {
            for($columna = 0; $columna < 3; $columna++) {
                if ($tablero[$fila][$columna] == 'X') {
                    $cuantasX++;
               }
            }
        }            

        //Hacer la condicion para cuando sea igual a 3 X, asi se tiene en cuenta 
        //la fila y columna de origen.

        //Genero una posicion random de la maquina para guardar en el tablero.


        //Mostrar tablero.
        echo "<table border=1>";
        for($intFila=0;$intFila<=2;$intFila++) {
            echo "<tr>";
            for($intColumna=0;$intColumna<=2;$intColumna++) {
                echo "<td style='text-align: center; height: 25px; width:25px;'>".$tablero[$intFila][$intColumna]."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        //Antes de enviar el formulario, vuelvo a convertir el tablero en un string.
        $filasTableros = [];
        foreach($tablero as $filaArray) {
            $filasTableros[] = implode("", $filaArray);
        }

        $textoTablero = implode("|", $filasTableros);

        //Genero el formulario.
        echo "<br>";
        echo "<table>";
        if($cuantasX < 3) {
            //Genero la tabla
            echo "<form action='TresEnRaya.php' method='get'>";
            echo "<tr><td><label for='filaDestino'>Introduce la fila de destino: </label></td>";
            echo "<td><input type='text' name='filaDestino' required></td></tr>";
            echo "<tr><td><label for='columnaDestino'>Introduce la columna de destino: </label></td>";
            echo "<td><input type='text' name='columnaDestino' required></td></tr>";
            echo "<tr><td><input type='submit' name='enviar'></td></tr>";
            echo "<input type='hidden' name='tablero' value='$textoTablero'>";

            echo "</form>";
        } else if ($cuantasX == 3) {
            echo "<p>Tienes las 3 X, ahora tienes que rellenar los 4 inputs.</p>";
            echo "<form action='TresEnRaya.php' method='get'>";
            echo "<tr><td><label for='filaDestino'>Introduce la fila de destino: </label></td>";
            echo "<td><input type='text' name='filaDestino' required></td></tr>";
            echo "<tr><td><label for='columnaDestino'>Introduce la columna de destino: </label></td>";
            echo "<td><input type='text' name='columnaDestino' required></td></tr>";
            echo "<tr><td><label for='filaOrigen'>Introduce la fila de origen: </label></td>";
            echo "<td><input type='text' name='filaOrigen' required><td></tr>";
            echo "<tr><td><label for='columnaOrigen'>Introduce la columna de origen: </label></td>";
            echo "<td><input type='text' name='columnaOrigen' required></td></tr>";
            echo "<tr><td><input type='submit' name='enviar'></td></tr>";
            echo "<input type='hidden' name='tablero' value='$textoTablero'>";

            echo "</form>";
        } else {
            echo "<p>Ya has puesto las 3 rayas.</p>";
        }

        echo "</table>";  
    ?>
</head>
</body>
</html>