<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tres en Raya</title> 
<!--Puse unos estilos simples para poder mejorar la visualizacion de la tabla -->
    <style>
        .tabla {
            border: none;
        }

        .header {
            border: none;
            width: 25px;
            height: 25px;
        }

        .celdas {
            border: 1px solid black;
            border-collapse:collapse;
            text-align: center;
            width: 25px;
            height: 25px;
        }
    </style>
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

        //Me he mandado por un campo oculto la cantidad de X y O en cada partida.
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

        //Solo compruebo la fila y columna de destino porque inicialmente solo trabaje con estos 2 campos.
        if(isset($_GET['filaDestino']) && isset($_GET['columnaDestino'])) {
            $filaDestino = (int)$_GET['filaDestino'] -1;
            $columnaDestino = (int)$_GET['columnaDestino'] -1;

            //Si existe esa posicion en el tablero entonces puedo trabajar sobre el.
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
                    //Solo para que aparezca las primeras 2 veces.
                    if($cuantasX < 3) {
                        echo "<p>*Esa posición está ocupada</p>";
                    }
                } 
            } else {
                echo "<p>*Esa posición no existe.</p>";
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
        
        //Si hay 3 'X' entonces empezamos a tomar en cuenta y modificar las del origen.
        if($cuantasX == 3) {
            if(isset($_GET['filaDestino']) && isset($_GET['columnaDestino']) && isset($_GET['filaOrigen']) && isset($_GET['columnaOrigen'])) {
                $filaOrigen = (int) $_GET['filaOrigen'] - 1;
                $columnaOrigen = (int) $_GET['columnaOrigen'] - 1;

                //Si existe la posicion de origen y destino en el tablero entonces empiezo a hacer comprobaciones.
                if(isset($tablero[$filaDestino][$columnaDestino]) && isset($tablero[$filaOrigen][$columnaOrigen])) {
                    //Si no esta ocupada la fila de destino, verifico si la posicion de origen es su ficha.
                    if($tablero[$filaDestino][$columnaDestino] == '-') {
                        if($tablero[$filaOrigen][$columnaOrigen] == 'X') {
                            $tablero[$filaOrigen][$columnaOrigen] = '-';

                            $tablero[$filaDestino][$columnaDestino] = 'X';

                            //Genero la posicion origen de la maquina.
                            $filaOrigenMaquina = rand(0,2);
                            $columnaOrigenMaquina = rand(0,2);
                    
                            //Hasta que esa posicion no sea una 'O', no saldra del bucle. Una vez fuera, puede quitar la ficha 'O'.
                            while ($tablero[$filaOrigenMaquina][$columnaOrigenMaquina] != 'O') {
                                $filaOrigenMaquina = rand(0,2);
                                $columnaOrigenMaquina = rand(0,2);
                            }

                            $tablero[$filaOrigenMaquina][$columnaOrigenMaquina] = '-';
                
                            //Hasta que la posicion de destino de la maquina no este libre, generara la posicion. Una vez fuera, colocara la 'O'.
                            while ($tablero[$filaMaquina][$columnaMaquina] != '-' || 
                                $tablero[$filaMaquina][$columnaMaquina] == 'X') {
                                $filaMaquina = rand(0,2);
                                $columnaMaquina = rand(0,2);
                            }

                            $tablero[$filaMaquina][$columnaMaquina] = 'O';
                        } else {
                            echo "<p>*La posicion de origen no es tu ficha 'X'</p>";
                        }
                    } else {
                        //Hago otra comprobacion porque una vez fuera de la condicion, no comprueba la siguiente y puede que se generen ambas.
                        if($tablero[$filaOrigen][$columnaOrigen] == 'X') {
                            echo "<p>*La posicion en la que quieres mover tu ficha esta ocupada.</p>";
                        } else {
                            echo "<p>*La posicion de origen no es tu ficha 'X'</p>";
                            echo "<p>*La posicion en la que quieres mover tu ficha esta ocupada.</p>";
                        }
                    }
                } else {
                    echo "<p>*Elige filas y columnas que esten dentro del rango. (1-3)</p>";
                }
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
        echo "<table class='tabla'";
        echo "<tr>";
        echo "<th class ='header'></th><th class ='header'>1</th><th class ='header'>2</th><th class ='header'>3</th>";
        echo "</tr>";
        for($intFila=0;$intFila<=2;$intFila++) {
            echo "<tr>";
            echo "<th class='header'>" . $intFila + 1 . "</th>";
            for($intColumna=0;$intColumna<=2;$intColumna++) {
                echo "<td class ='celdas'>";
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

        //Si no ha ganado el jugador o la maquina, genero el formula dependiendo de si ya tiene sus 3 fixchas en el tablero.
        echo "<br>";
        echo "<table>";
        if($ganaX) {
            echo "<p>¡Felicidades, haz ganado!</p>";
        } else if ($ganaO) {
            echo "<p>¡Gana la maquina!</p>";
            echo "<p>mejor suerte la proxima.</p>";
        } else {
            echo "<form action='TresEnRaya.php' method='get'>";
            echo "<tr><td><label for='filaDestino'>Introduce la fila de destino: </label></td>";
            echo "<td><input type='text' name='filaDestino' required></td></tr>";
            echo "<tr><td><label for='columnaDestino'>Introduce la columna de destino: </label></td>";
            echo "<td><input type='text' name='columnaDestino' required></td></tr>";
            if($cuantasX == 3) {
                echo "<tr><td><label for='filaOrigen'>Introduce la fila de origen: </label></td>";
                echo "<td><input type='text' name='filaOrigen' required><td></tr>";
                echo "<tr><td><label for='columnaOrigen'>Introduce la columna de origen: </label></td>";
                echo "<td><input type='text' name='columnaOrigen' required></td></tr>";
                echo "<p>Tienes las 3 fichas en el tablero, ahora tienes que especificar la ficha que quieres mover y a donde quieres moverla. </p>";
            }
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