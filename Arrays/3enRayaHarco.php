<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3 en raya</title>
</head>
<body>

    <?php 
    
 /* Si uno de los jugadores ha ganado y ha pulsado el botón de resetear
    se vuelve a poner el tablero en blanco para poder volver a jugar */
    if (isset($_GET['reiniciar']) && $_GET['reiniciar'] == 1) {
    $tablero = [
        1 => [1 => "", 2 => "", 3 => ""],
        2 => [1 => "", 2 => "", 3 => ""],
        3 => [1 => "", 2 => "", 3 => ""]
        ];
    }
    
 /* Si se ha mandado el tablero desde el formulario con los campos ocultos
    se usa ese como tablero sino se usa uno entero en blanco para empezar */
    if (isset($_GET['tablero'])) {
        $tablero = $_GET['tablero'];
    } else {
        $tablero = [
        1 => [1 => "", 2 => "", 3 => ""],
        2 => [1 => "", 2 => "", 3 => ""],
        3 => [1 => "", 2 => "", 3 => ""]
        ];
    }

 /* Contadores de X y O 
    se recorre el tablero y se cuentan el número de X y de O */
    $contadorX = 0;
    $contadorO = 0;
     foreach ($tablero as $numFila => $Fila) { 
        foreach ($Fila as $numCol => $Casilla) {
           if ($Casilla == "X") {
            $contadorX++;
           } elseif ($Casilla == "O") {
            $contadorO++;
           }
        }
    }


    //Variables
    $usuFilaDestino = $_GET["FilaDestino"] ?? null;
    $usuColumnaDestino = $_GET["ColumnaDestino"] ?? null;
    $pcFilaDestino = rand(1,3);
    $pcColumnaDestino = rand(1,3);
    $usuFilaOrigen = $_GET['FilaOrigen'] ?? null;
    $usuColumnaOrigen = $_GET['ColumnaOrigen'] ?? null;
    

 /* Si hay menos de 3 X en el tablero se comprueba que la casilla esté vacio
    y se coloca la X */
    if ($contadorX < 3) {
        if (isset($usuFilaDestino) && isset($usuColumnaDestino) 
        && $tablero[$usuFilaDestino][$usuColumnaDestino] !== "X" 
        && $tablero[$usuFilaDestino][$usuColumnaDestino] !== "O" ) {
        $tablero[$usuFilaDestino][$usuColumnaDestino] = "X";
        
     /* Comprueba que la casilla este vacia para asignarle una O,
        si no lo está genera numeros aletarios hasta que coincida
        con una casilla vacia */
        while ($tablero[$pcFilaDestino][$pcColumnaDestino] == "X" ||
        $tablero[$pcFilaDestino][$pcColumnaDestino] == "O") {
        $pcFilaDestino = rand(1,3);
        $pcColumnaDestino = rand(1,3);
        }
        //Si el contador de O es menor de 3 asigna la O a la casilla
        if ($contadorO < 3) {
            $tablero[$pcFilaDestino][$pcColumnaDestino] = "O";
        }  
        }
 /* Todo este bloque es la asignación de valores una vez que se han colocado 3 X*/
    } else {
            if (isset($usuFilaOrigen) && isset($usuColumnaOrigen) &&
                isset($usuFilaDestino) && isset($usuColumnaDestino)) {

                    if ($tablero[$usuFilaOrigen][$usuColumnaOrigen] == "X" &&
                        $tablero[$usuFilaDestino][$usuColumnaDestino] == "") {
                            $tablero[$usuFilaOrigen][$usuColumnaOrigen] = ""; //Se borra el origen
                            $tablero[$usuFilaDestino][$usuColumnaDestino] = "X";//Se coloca la X en la nueva posición

                         /* Se sacan numeros random hasta que coincida
                            con una casilla con un O para borrarla */
                            $pcFilaDestino = rand(1,3);
                            $pcColumnaDestino = rand(1,3);

                            while ($tablero[$pcFilaDestino][$pcColumnaDestino] !== "O") {
                                        $pcFilaDestino = rand(1,3);
                                        $pcColumnaDestino = rand(1,3);
                            }
                           /* Guardamos la posicion que vamos a borrar para qu el pc no borre esa
                              posición y después la coloque otra vez en esa misma posición
                              dando lugar a que parezca que no ha movido */
                            $casillaEvitarPc = $tablero[$pcFilaDestino][$pcColumnaDestino];
                            $tablero[$pcFilaDestino][$pcColumnaDestino] = "";

                         /* Se sacan otra vez numeros random hasta que coincida
                            con una casilla vacia para colocar la O */
                            $pcFilaDestino = rand(1,3);
                            $pcColumnaDestino = rand(1,3);

                            while ($tablero[$pcFilaDestino][$pcColumnaDestino] == "X" ||
                                    $tablero[$pcFilaDestino][$pcColumnaDestino] == "O" || 
                                    $tablero[$pcFilaDestino][$pcColumnaDestino] == $casillaEvitarPc) {
                                            $pcFilaDestino = rand(1,3);
                                            $pcColumnaDestino = rand(1,3);
                                    }
                                    $tablero[$pcFilaDestino][$pcColumnaDestino] = "O";
                            
                        }       

                    }
                }
                
 /* Este bloque controla los ganadores, se podría haber hecho con bucles 
    pero para asegurarme que no hubiera fallos lo he hardcodeado */           

    //Ganador filas X
    if (($tablero[1][1] == "X" && $tablero[1][2] == "X" && $tablero[1][3] == "X") || 
    ($tablero[2][1] == "X" && $tablero[2][2] == "X" && $tablero[2][3] == "X") || 
    ($tablero[3][1] == "X" && $tablero[3][2] == "X" && $tablero[3][3] == "X")) {
        $ganador = "las X";
    //Ganador columnas X
    } elseif (($tablero[1][1] == "X" && $tablero[2][1] == "X" && $tablero[3][1] == "X") || 
    ($tablero[1][2] == "X" && $tablero[2][2] == "X" && $tablero[3][2] == "X") || 
    ($tablero[1][3] == "X" && $tablero[2][3] == "X" && $tablero[3][3] == "X")) {
        $ganador = "las X";
    //Ganador diagonales X
    } elseif (($tablero[1][1] == "X" && $tablero[2][2] == "X" && $tablero[3][3] == "X") || 
    ($tablero[1][3] == "X" && $tablero[2][2] == "X" && $tablero[3][1] == "X")) {
        $ganador = "las X";
    }

    //Ganador filas O
    if (($tablero[1][1] == "O" && $tablero[1][2] == "O" && $tablero[1][3] == "O") || 
    ($tablero[2][1] == "O" && $tablero[2][2] == "O" && $tablero[2][3] == "O") || 
    ($tablero[3][1] == "O" && $tablero[3][2] == "O" && $tablero[3][3] == "O")) {
        $ganador = "los O";
    //Ganador columnas O
    } elseif (($tablero[1][1] == "O" && $tablero[2][1] == "O" && $tablero[3][1] == "O") || 
    ($tablero[1][2] == "O" && $tablero[2][2] == "O" && $tablero[3][2] == "O") || 
    ($tablero[1][3] == "O" && $tablero[2][3] == "O" && $tablero[3][3] == "O")) {
        $ganador = "los O";
    //Ganador diagonales O
    } elseif (($tablero[1][1] == "O" && $tablero[2][2] == "O" && $tablero[3][3] == "O") || 
    ($tablero[1][3] == "O" && $tablero[2][2] == "O" && $tablero[3][1] == "O")) {
        $ganador = "los O";
    }

    ?>

  <!-- Formulario -->
    <form method="get">
    <?php 
    // Si hay más de 3 X se muestran los inputs de origen
    if($contadorX == 3) {
        echo '<label for="FilaOrigen">Introduce la fila de origen:</label>';
        echo '<input type="number" name="FilaOrigen" min="1" max="3" required>';
        echo '<br><br>';
        echo '<label for="ColumnaOrigen">Introduce la columna de origen:</label>';
        echo '<input type="number" name="ColumnaOrigen" min="1" max="3" required>';
        echo '<br><br>';
    }
    ?>
    <label for="FilaDestino">Introduce la fila de destino:</label>
    <input type="number" name="FilaDestino" min="1" max="3" required>
    <br><br>
    <label for="ColumnaDestino">Introduce la columna de destino:</label>
    <input type="number" maxlength="1" name="ColumnaDestino" min="1" max="3">
    <br><br>

    <?php 
 /* Aqui se generan lo inputs hidden para guardar el estado del tablero,
    se podrían haber puesto los 9 por separado pero al contrario que con 
    las comprobaciones decidí hacerlo con un bucle ya que no me resultaba
    tan complicado */
    foreach ($tablero as $numFila => $Fila) {
        foreach ($Fila as $numCol => $Casilla) {
            echo "<input type='hidden' name='tablero[$numFila][$numCol]' value='$Casilla'>";
        }
    }
    ?>
    <input type="submit">
    </form>
    <br>
    <?php
    //Se crea la tabla
    echo "<table border='1'>";
    foreach ($tablero as $numFila => $Fila) {
        echo "<tr>";
        foreach ($Fila as $numCol => $Casilla) {
            echo "<td style='width: 100px; height: 100px; text-align: center; font-size: 60px;'>";
            echo $Casilla;
        }
    }
    echo "</table>";

  /* Si hay ganador se muestra y se crea una tabla desde cero
     y un boton para resetear */
     if (isset($ganador)) {
        echo "<h2>El ganador son $ganador</h2>";
        $tablero = [
        1 => [1 => "", 2 => "", 3 => ""],
        2 => [1 => "", 2 => "", 3 => ""],
        3 => [1 => "", 2 => "", 3 => ""]
        ];
        echo "<form method='get'>";
        echo "<input type='hidden' name='reiniciar' value='1'>";
        echo "<input type='submit' value='Reiniciar partida'>";
        echo "</form>";
    }
    ?>
    
</body>
</html>