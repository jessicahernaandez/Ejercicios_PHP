
        <form method="get">
            Fila Origen: <input type="number" min="0" max ="2" name="filaOrigen">
            Columna Origen: <input type="number" min="0" max ="2" name="columnaOrigen"> <br/>

            Fila Destino: <input type="number" min="0" max ="2" name="filaDestino">
            Columna Destino: <input type="number" min="0" max ="2" name="columnaDestino"> <br/>
            
                <?php

                $titulo = "Tres en raya";
                include("cabecera.inc.php");

                // Biblioteca con funciones
                include("funcionesParaTresEnRaya.inc.php");

                // Array que contiene las posiciones ganadoras.
                $posicionesGanadoras = [
                    [0,3,6], //columna1
                    [1,4,7], //columna2
                    [2,5,8], //columna3
                    [0,1,2], //fila1
                    [3,4,5], //fila1
                    [6,7,8], //fila3
                    [0,4,8], //diagonal1
                    [2,4,6]  //diagonal2
                ];

                // podría haber trabajado con un array usando explode(' ', $_get('tablero'));
                $strTablero = $_GET["tablero"]??"BBBBBBBBB"; // valores de las casillas
                $intFilaOrigen = $_GET["filaOrigen"]??-1;
                $intFilaDestino = $_GET["filaDestino"]??-1;
                $intColumnaOrigen = $_GET["columnaOrigen"]??-1;
                $intColumnaDestino = $_GET["columnaDestino"]??-1;
                $blnPoneX = false;

                // voy a poner la ficha X en la ubicación que me pidan si se puede
                // si los valores no están fuera de rango
                if($intFilaDestino!==null && $intFilaDestino>=0 && $intFilaDestino<=2 &&
                   $intColumnaDestino!==null && $intColumnaDestino>=0 && $intColumnaDestino<=2){
                       //si el destino está vacío podré mover
                    if($strTablero[$intFilaDestino * 3 + $intColumnaDestino ]=='B') {
                        if (substr_count($strTablero, 'X') < 3) {//si hay menos de tres fichas, la muevo
                            //Llamo a la funcion que coloca las fichas de estino.
                            $blnPoneX = colocaFichasDestino($strTablero, $intFilaDestino, $intColumnaDestino, 'X');
                        }else if(null == $intFilaOrigen || null == $intColumnaOrigen) // si hay tres fichas y no indico origen, no puedo moverla
                                echo "Tienes que indicar el origen, ya que tienes tres fichas sacadas";
                                //si la ficha origen no es mía, no la puedo mover
                        else if (isset($strTablero[($intFilaOrigen * 3 + $intColumnaOrigen)]) && $strTablero[($intFilaOrigen * 3 + $intColumnaOrigen)] == 'X') {
                                //Llamo a la funcion que coloca las fichas de origen y de destino.
                                $blnPoneX = colocaFichasOrigenyDestino($strTablero, $intFilaDestino, $intColumnaDestino, $intFilaOrigen, $intColumnaOrigen, 'X');
                        } else
                                echo "No puedes mover una ficha que no es tuya";
                    }else
                        echo "No puedes poner una ficha en un sito ocupado";             
                } else if (isset($_GET["filaDestino"])) {//Si es la primera vez que llamo, no indico error
                        if ($intFilaDestino == null || $intColumnaDestino == null)
                            echo "Debes indicar algún valor para la FILA y COLUMNA destino";
                        else
                            echo "Fila $intFilaDestino o Columna Destino $intColumnaDestino fuera de rango (0 a 2)";
                }

                //muevo O, si se ha movido X
                //Busco una posición de destino vacía
                if ($blnPoneX) {
                    do {
                        $intFilaDestino = rand(0, 2);
                        $intColumnaDestino = rand(0, 2);
                    } while ($strTablero[$intFilaDestino * 3 + $intColumnaDestino] != 'B');
                    //Si no tengo 3 fichas sacadas, busco una posición origen aleatoria
                    //Pongo tambien la condicion de si el tablero tiene 1 'O' para que pueda bloquear a la X.
                    if (substr_count($strTablero, 'O') == 1 || substr_count($strTablero, 'O') == 2) { //Si tiene 1 o 2 fichas 'O' verifico si hay una posicion en la que pueda ganar.
                        //La funcion devolvera la posicion que puede ganar (si la encuentra, si no -1).
                        $posicion = puedeGanarO($strTablero, $posicionesGanadoras);
                        if($posicion != -1) {
                            $strTablero[$posicion] = 'O';
                        } else { //Si devuelve -1, entonces llamo a la funcion que bloquea a la X, si existe, devuelve esa posicion, si no -1.
                            $posicion = ObloqueaX($strTablero, $posicionesGanadoras);
                            if($posicion != -1) { 
                                $strTablero[$posicion] = 'O';
                            } else { //Y si no encuentra posicion ganadora, ni para bloquear a X, entonces la coloca en una aleatoria.
                                $strTablero[$intFilaDestino * 3 + $intColumnaDestino] = 'O';
                            }
                        }
                    } else if (substr_count($strTablero, 'O') == 3) {
                        while ($strTablero[($intFilaOrigen = rand(0, 2)) * 3 + ($intColumnaOrigen = rand(0, 2))] != 'O') ;// busco una ficha origen a mover
                        $strTablero[$intFilaOrigen * 3 + $intColumnaOrigen] = 'B'; 
                        // Lo mismo que la anterior, al quitar la ficha de origen, verifico si la posicion en la que esta la ficha 'O' puede ganar.
                        // Si no, se llama a la funcion de bloquear, y si ninguna de las 2 ha dado exito, se coloca en una posicion random.
                        $posicion = puedeGanarO($strTablero, $posicionesGanadoras);
                        if($posicion != -1) {
                            $strTablero[$posicion] = 'O';
                        } else {
                            $posicion = ObloqueaX($strTablero, $posicionesGanadoras);
                            if($posicion != -1) {
                                $strTablero[$posicion] = 'O';
                            } else {
                                $strTablero[$intFilaDestino * 3 + $intColumnaDestino] = 'O';
                            }
                        }
                    } else {
                        $strTablero[$intFilaDestino * 3 + $intColumnaDestino] = 'O'; //pongo la ficha
                    }
                }
                //compruebo si ha ganado alguno, llamo a a funcion que me dice si gana X, O o me devuelve B, que significa que no ha ganado ninguno.
                $chrGanador = compruebaGanador($strTablero, 'X', 'O', $posicionesGanadoras);
                
                //imprime el tablero
                muestraTablero($strTablero);
                
                if($chrGanador != 'B')
                        echo "<h1> Ha ganado $chrGanador</h1>";
                    else
                        echo "<p><input type='submit' value='mover'></p>";

                include("pie.inc.php");
                ?>

        </form>
