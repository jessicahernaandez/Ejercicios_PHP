
        <form method="get">
            Fila Origen: <input type="number" min="0" max ="2" name="filaOrigen">
            Columna Origen: <input type="number" min="0" max ="2" name="columnaOrigen"> <br/>

            Fila Destino: <input type="number" min="0" max ="2" name="filaDestino">
            Columna Destino: <input type="number" min="0" max ="2" name="columnaDestino"> <br/>
                
                <?php

                $titulo = "Tres en raya";
                include("cabecera.inc.php");

                // Biblioteca con funciones
                include("funciones3EnRaya.inc.php");

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
                            $blnPoneX = colocaFichasDestino($strTablero, $intFilaDestino, $intColumnaDestino, 'X');
                        }else if(null == $intFilaOrigen || null == $intColumnaOrigen) // si hay tres fichas y no indico origen, no puedo moverla
                                echo "Tienes que indicar el origen, ya que tienes tres fichas sacadas";
                                //si la ficha origen no es mía, no la puedo mover
                        else if (isset($strTablero[($intFilaOrigen * 3 + $intColumnaOrigen)]) && $strTablero[($intFilaOrigen * 3 + $intColumnaOrigen)] == 'X') {
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
                if($blnPoneX) {
                    $posicionesODestino = [];
                     
                    if(substr_count($strTablero,'O') == 0) { // Si no hay ninguna ficha O, generamos cualquierposicion.
                        $posicionesODestino = fichasAleatoriasO($strTablero, 'B');
                        colocaFichasDestino($strTablero, $posicionesODestino[0], $posicionesODestino[1], 'O');
                    } else if (substr_count($strTablero,'O') == 1) { // Si tenemos 1 ficha, generaremos la segunda seguida de las posiciones disponibles.
                        $posicionesODestino = Oen2linea($strTablero);
                        colocaFichasDestino($strTablero, $posicionesODestino[0], $posicionesODestino[1], 'O');
                    } else if (substr_count($strTablero,'O') == 2) {
                        $posicionesODestino = posicionGanaO($strTablero);
                        colocaFichasDestino($strTablero, $posicionesODestino[0], $posicionesODestino[1], 'O');
                    } else if (substr_count($strTablero,'O') == 3) {
                        $posicionesOrigenO = fichasAleatoriasO($strTablero, 'O');
                        $posicionesODestino = fichasAleatoriasO($strTablero, 'B');
                        colocaFichasOrigenyDestino($strTablero, $posicionesODestino[0], $posicionesODestino[1], $posicionesOrigenO[0], $posicionesOrigenO[1], 'O');
                    }
                    print_r($posicionesODestino);
                }

                //compruebo si ha ganado alguno, llamo a a funcion que me dice si gana X, O o me devuelve B, que significa que no ha ganado ninguno.
                $chrGanador = compruebaGanador($strTablero, 'X', 'O');

                //imprime el tablero
                muestraTablero($strTablero);
                
                if($chrGanador != 'B')
                        echo "<h1> Ha ganado $chrGanador</h1>";
                    else
                        echo "<p><input type='submit' value='mover'></p>";

                include("pie.inc.php");
                ?>

        </form>
