<!--

Se desea crear un ejercicio similar al del tetris para el tres en raya. 
El programa a a ir solicitando al usuario que indique que ficha quiere mover a que posición. 
Lo hace mediante cuatro campos de tipo input, donde se indica fila y columna origen y destino. 
Si no están todas las fichas insertadas del jugador, se permite que no meta el origen. 
Si es una juegada correcta, insertaremos de manera automática un movimiento. 
Las fichas se mostrarán en una tabla con los valores X y O, para jugador. 
Cada vez que el jugador haga un movimiento o que movamos la ficha, comprobaremos si la jugada es ganadora y en ese caso indicaremos quien ha ganado. 
Se puede mejorar el programa, haciendo que se mueva la ficha nuestra a la posición que gane la partida si es que existe.

-->

<?php
    $chrGanador = null;

echo "Variables de post: ";
print_r($_POST);
echo "<br />";

    $tablero=[];
    $numFichas=0; //cuento cuantas X hay para saber si necesito posición de origen o no
    //carga valores en el array
    if (!isset($_GET['reset'])) {
        // Si venimos de un envío del formulario, recuperamos el tablero oculto
        for ($i=0; $i<3; $i++) {
            for ($j=0; $j<3; $j++) {
                $name = 'c' . $i . $j;
                if (isset($_POST[$name])) {
                    $val = $_POST[$name];
                    if ($val === 'X') {
                        $tablero[$i][$j] = 'X';
                        $numFichas++; // tengo una X más
                    }else if($val === 'O') {
                                $tablero[$i][$j] = 'O';
                        }else
                            $tablero[$i][$j] = ' ';
                }else {
                        $tablero[$i][$j] = ' ';
                       }

            }
        }
    }else {
        $tablero = [
                [' ', ' ', ' '],
                [' ', ' ', ' '],
                [' ', ' ', ' ']
        ];
    }

echo "<br /> con los datos cargados <br />";
print_r($tablero);
echo "<br />";

    // Datos para mover o colocar la ficha X
    $filaOrigen = $_POST['filaOrigen'] ?? -1;
    $columnaOrigen = isset($_POST['columnaOrigen']) ? $_POST['columnaOrigen'] : -1;
    $filaDestino = isset($_POST['filaDestino']) ? $_POST['filaDestino'] : -1;
    $columnaDestino = isset($_POST['columnaDestino']) ? $_POST['columnaDestino'] : -1;

    if ($filaDestino >= 0 &&  $filaDestino <= 2 && $columnaDestino >= 0 && $columnaDestino <= 2) {
        // Si aun no hay 3 y el destino está vacío, coloco una nueva
        if ($numFichas < 3 )
            if($tablero[$filaDestino][$columnaDestino] === ' ') {
                $tablero[$filaDestino][$columnaDestino] = 'X';
                //$numFichas++; //para saber que puedo meter luego la O
            } else
                echo "<h1> No puedes mover fichas a posiciones que no estén vacías</h1>";
        else {
            // Si ya hay 3 se mueve una de origen a destino
            if ($filaOrigen >= 0 &&  $filaOrigen <= 2 && $columnaOrigen >= 0 && $columnaOrigen <= 2) {
                if ($tablero[$filaOrigen][$columnaOrigen] === 'X' && $tablero[$filaDestino][$columnaDestino] === ' ') {
                    $tablero[$filaOrigen][$columnaOrigen] = ' ';
                    $tablero[$filaDestino][$columnaDestino] = 'X';
                }
            }
        }

        // Comprobar jugada ganadora
        $chrGanador = null;
        for ($i=0; $i<3 && $chrGanador===null; $i++) {
            // si gana por la fila
            if ($tablero[$i][0] != ' ' && $tablero[$i][0] == $tablero[$i][1] && $tablero[$i][1] == $tablero[$i][2]) $chrGanador = $tablero[$i][0];
            // si gana por la columna
            if ($chrGanador===null && $tablero[0][$i] != ' ' && $tablero[0][$i] == $tablero[1][$i] && $tablero[1][$i] == $tablero[2][$i]) $chrGanador = $tablero[0][$i];
        }
        // diagonales
        if ($chrGanador===null && $tablero[0][0] != ' ' && $tablero[0][0] == $tablero[1][1] && $tablero[1][1] == $tablero[2][2]) $chrGanador = $tablero[0][0];
        if ($chrGanador===null && $tablero[0][2] != ' ' && $tablero[0][2] == $tablero[1][1] && $tablero[1][1] == $tablero[2][0]) $chrGanador = $tablero[0][2];

        // Movimiento otro jugador
        if ($chrGanador === null) {
            $intFila=0;
            //Quito una ficha antes de mover
            if($numFichas==3)
                for ($blnQuitada=false; $intFila<3 && !blnQuitada; $intFila++)
                    for ($intColumna=0; $$intColumna<3 && !blnQuitada; $intColumna++)
                        if($tablero[$intFila][$intColumna] === 'O') {
                            $tablero[$intFila][$intColumna] = ' ';
                            $blnQuitada=true;
                        }
            $blnMovientoHecho = false;
            // Comprueba si existe alguna casilla en la que podria ganar para poner la ficha
            // No estoy quitando ninguna ficha, sino que añado otra
            for ($i=0; $i<3 && !$blnMovientoHecho; $i++) {
                for ($j=0; $j<3 && !$blnMovientoHecho; $j++) {
                    if ($tablero[$i][$j] === ' ') {
                        $tablero[$i][$j] = 'O';
                        // Comprobar si gana con la jugada
                        $gtemp = null;
                        for ($ii=0; $ii<3 && !$blnMovientoHecho; $ii++) {
                            if ($tablero[$ii][0] == 'O' && $tablero[$ii][1] = 'O' && $tablero[$ii][2] = 'O') $blnMovientoHecho=true;
                            if ($gtemp===null && $tablero[0][$ii] != 'O' && $tablero[1][$ii] = 'O' && $tablero[2][$ii] = 'O') $blnMovientoHecho=true;
                        }
                        if ($gtemp===null && $tablero[0][0] == 'O' && $tablero[1][1] = 'O' && $tablero[2][2] = 'O') $blnMovientoHecho=true;
                        if ($gtemp===null && $tablero[0][2] == 'O' && $tablero[1][1] == 'O' && $tablero[2][0] == 'O') $blnMovientoHecho=true;

                        if ($blnMovientoHecho)
                            $chrGanador = 'O';
                        else
                            $tablero[$i][$j] = ' ';
                    }
                }
            }
            // Si no puede coloca en la primera casilla libre
            if (!$blnMovientoHecho) {
                $colocada = false;
                for ($i=0; $i<3 && !$colocada; $i++) {
                    for ($j=0; $j<3 && !$colocada; $j++) {
                        if ($tablero[$i][$j] === ' ') {
                            $tablero[$i][$j] = 'O';
                            $colocada = true;
                        }
                    }
                }
                if ($colocada) {
                    // Comprobar si hay ganador
                    $chrGanador = null;
                    for ($i2=0; $i2<3 && $chrGanador===null; $i2++) {
                        if ($tablero[$i2][0] != ' ' && $tablero[$i2][0] == $tablero[$i2][1] && $tablero[$i2][1] == $tablero[$i2][2]) $chrGanador = $tablero[$i2][0];
                        if ($chrGanador===null && $tablero[0][$i2] != ' ' && $tablero[0][$i2] == $tablero[1][$i2] && $tablero[1][$i2] == $tablero[2][$i2]) $chrGanador = $tablero[0][$i2];
                    }
                    if ($chrGanador===null && $tablero[0][0] != ' ' && $tablero[0][0] == $tablero[1][1] && $tablero[1][1] == $tablero[2][2]) $chrGanador = $tablero[0][0];
                    if ($chrGanador===null && $tablero[0][2] != ' ' && $tablero[0][2] == $tablero[1][1] && $tablero[1][1] == $tablero[2][0]) $chrGanador = $tablero[0][2];
                }
            }
        }
    }
    if ($chrGanador) {
        echo "Ganador";
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    </head>

    <body>

        <!-- Tabla -->
        <table border="1">
            <?php
echo "<br /> ************** <br />";
print_r($tablero);
echo "**********".$tablero[1][0]."***<br />";
                for ($i = 0; $i < 3; $i++) {
                    echo "<tr>";
                    for ($j = 0; $j < 3; $j++) {
                        echo "<td>" . $tablero[$i][$j] . "</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </table>

        <form method="post">
            <input type="hidden" name="c00" value="<?php echo $tablero[0][0]; ?>">
            <input type="hidden" name="c01" value="<?php echo $tablero[0][1]; ?>">
            <input type="hidden" name="c02" value="<?php echo $tablero[0][2]; ?>">
            <input type="hidden" name="c10" value="<?php echo $tablero[1][0]; ?>">
            <input type="hidden" name="c11" value="<?php echo $tablero[1][1]; ?>">
            <input type="hidden" name="c12" value="<?php echo $tablero[1][2]; ?>">
            <input type="hidden" name="c20" value="<?php echo $tablero[2][0]; ?>">
            <input type="hidden" name="c21" value="<?php echo $tablero[2][1]; ?>">
            <input type="hidden" name="c22" value="<?php echo $tablero[2][2]; ?>">
            <div>
                <label>Origen:</label>
                Fila <input type="number" name="filaOrigen" min="0" max="2">
                Columna <input type="number" name="columnaOrigen" min="0" max="2">
            </div>
            <div>
                <label>Destino:</label>
                Fila <input type="number" name="filaDestino" required min="0" max="2">
                Columna <input type="number" name="columnaDestino" required min="0" max="2">
            </div>
            <button type="submit">Enviar</button>
            <button type="reset">Reset</button>
        </form>
    </body>
</html>
