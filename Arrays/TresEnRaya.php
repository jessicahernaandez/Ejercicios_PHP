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

        if(isset($_GET['cuantasX']) && isset($_GET['cuantasO'])) {
            $cuantasX = $_GET['cuantasX'];
            $cuantasO = $_GET['cuantasO'];
        } else {
            $cuantasX = 0;
            $cuantasO = 0;
        }

        $posicionesGanadoras = [
            [[0,0], [0,1], [0,2]],
            [[1,0], [1,1], [1,2]],
            [[2,0], [2,1], [2,2]],
            [[0,0], [1,0], [2,0]],
            [[0,1], [1,1], [2,1]],
            [[0,2], [1,2], [2,2]],
            [[0,0], [1,1], [2,2]],
            [[0,2], [1,1], [2,0]]
        ];

        $posicionesX = [];
        $posicionesO = [];

        //Ahora que ya tengo el tablero en array trabajo sobre él.
        //Genero fila y columna de la maquina inicialmente.
        $filaMaquina = rand(0,2);
        $columnaMaquina = rand(0,2);
        if(isset($_GET['filaDestino']) && isset($_GET['columnaDestino'])) {
            $filaDestino = $_GET['filaDestino'] -1;
            $columnaDestino = $_GET['columnaDestino'] -1;

            if(isset($tablero[$filaDestino][$columnaDestino])) {
                if ($tablero[$filaDestino][$columnaDestino] === '-' && $cuantasX < 3) {
                    $tablero[$filaDestino][$columnaDestino] = 'X';

                    //Mientras no sea una posicion que no este ocupada, genera la fila y columna de la maquina.
                    while ($tablero[$filaMaquina][$columnaMaquina] != '-' || 
                        $tablero[$filaMaquina][$columnaMaquina] == 'X') {
                        $filaMaquina = rand(0,2);
                        $columnaMaquina = rand(0,2);
                    }
                    $tablero[$filaMaquina][$columnaMaquina] = 'O';
                } else {
                    if($tablero[$filaDestino][$columnaDestino] != '-') {
                        echo "<p>Esa posición está ocupada</p>";
                    }
                } 
            } else {
                echo "<p>Esa posición no existe.</p>";
            }
        }

        //Compruebo cuantas 'X' y 'O' hay.
        //Vuelvo a reiniciar a 0 las variables para que no cuente demás.
        $cuantasX = 0;
        $cuantasO = 0;
        for($fila = 0; $fila < 3; $fila++) {
            for($columna = 0; $columna < 3; $columna++) {
                if ($tablero[$fila][$columna] == 'X') {
                    $cuantasX++;
                } else if ($tablero[$fila][$columna] == 'O') {
                    $cuantasO++;
                }
            }
        }
        
        //Si hay 3 'O' entonces empezamos a modificar las del origen.
        if($cuantasX == 3) {
            if(isset($_GET['filaOrigen']) && isset($_GET['columnaOrigen'])) {
                $filaOrigen = $_GET['filaOrigen'] - 1;
                $columnaOrigen = $_GET['columnaOrigen'] - 1;

                if($tablero[$filaDestino][$columnaDestino] == '-') {
                    if($tablero[$filaOrigen][$columnaOrigen] == 'X') {
                        $tablero[$filaOrigen][$columnaOrigen] = '-';

                        $tablero[$filaDestino][$columnaDestino] = 'X';
                    }
                }

                $filaOrigenMaquina = rand(0,2);
                $columnaOrigenMaquina = rand(0,2);
                    
                while ($tablero[$filaOrigenMaquina][$columnaOrigenMaquina] != 'O') {
                    $filaOrigenMaquina = rand(0,2);
                    $columnaOrigenMaquina = rand(0,2);
                }

                $tablero[$filaOrigenMaquina][$columnaOrigenMaquina] = '-';
                
                while ($tablero[$filaMaquina][$columnaMaquina] != '-' || 
                    $tablero[$filaMaquina][$columnaMaquina] == 'X') {
                    $filaMaquina = rand(0,2);
                    $columnaMaquina = rand(0,2);
                }

                $tablero[$filaMaquina][$columnaMaquina] = 'O';
            }
        } 

        //Verifico si 'X' tiene alguna linea ganadora.
        $ganaX = false;
        foreach($posicionesGanadoras as $combinacion) {
            $coincidenciasX = 0;
                foreach($combinacion as $par) {
                    $fila = $par[0];
                    $columna = $par[1];
                    if($tablero[$fila][$columna] == 'X') {
                        $coincidenciasX++;
                    }
                }

                if($coincidenciasX == 3) {
                    $ganaX = true;
                }
            }
        //Verifico si ha ganado la maquina, en el caso que el jugador no lo haya hecho.
        if(!$ganaX) {
            $ganaO = false;
            foreach($posicionesGanadoras as $combinacion) {
                $coincidenciasO = 0;
                foreach($combinacion as $par) {
                    $fila = $par[0];
                    $columna = $par[1];
                    if($tablero[$fila][$columna] == 'O') {
                    $coincidenciasO++;
                    }
                }

                if($coincidenciasO == 3) {
                    $ganaO = true;
                }
            }
        }

        //Mostrar tablero.
        echo "<table border=1>";
        for($intFila=0;$intFila<=2;$intFila++) {
            echo "<tr>";
            for($intColumna=0;$intColumna<=2;$intColumna++) {
                echo "<td style='text-align: center; height: 25px; width:25px;'>";
                echo $tablero[$intFila][$intColumna];
                echo "</td>";
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
        if($ganaX) {
            echo "<p>¡Felicidades, haz ganado!</p>";
        } else if ($ganaO) {
            echo "<p>¡Gana la maquina!</p>";
            echo "<p>mejor suerte la proxima.</p>";
        } else if ($cuantasX < 3) {
             //Genero la tabla
            echo "<form action='TresEnRaya.php' method='get'>";
            echo "<tr><td><label for='filaDestino'>Introduce la fila de destino: </label></td>";
            echo "<td><input type='text' name='filaDestino' required></td></tr>";
            echo "<tr><td><label for='columnaDestino'>Introduce la columna de destino: </label></td>";
            echo "<td><input type='text' name='columnaDestino' required></td></tr>";
            echo "<tr><td><input type='submit' name='enviar'></td></tr>";
            echo "<input type='hidden' name='tablero' value='$textoTablero'>";
            echo "<input type='hidden' name='cuantasX' value='$cuantasX'>";
            echo "<input type='hidden' name='cuantasO' value='$cuantasO'>";

            echo "</form>";
        } else if ($cuantasX == 3) {
            echo "<p>Tienes las 3 fichas en el tablero, ahora tienes que rellenar los 4 inputs siguientes: </p>";
            echo "<form action='TresEnRaya.php' method='get'>";
            echo "<tr><td><label for='filaOrigen'>Introduce la fila de origen: </label></td>";
            echo "<td><input type='text' name='filaOrigen' required><td></tr>";
            echo "<tr><td><label for='columnaOrigen'>Introduce la columna de origen: </label></td>";
            echo "<td><input type='text' name='columnaOrigen' required></td></tr>";
            echo "<tr><td><label for='filaDestino'>Introduce la fila de destino: </label></td>";
            echo "<td><input type='text' name='filaDestino' required></td></tr>";
            echo "<tr><td><label for='columnaDestino'>Introduce la columna de destino: </label></td>";
            echo "<td><input type='text' name='columnaDestino' required></td></tr>";
            echo "<tr><td><input type='submit' name='enviar'></td></tr>";
            echo "<input type='hidden' name='tablero' value='$textoTablero'>";
            echo "<input type='hidden' name='cuantasX' value='$cuantasX'>";
            echo "<input type='hidden' name='cuantasO' value='$cuantasO'>";

            echo "</form>";
        }
        echo "</table>";  
    ?>
</head>
</body>
</html>