<html>
    <head>
        <title>
            3 en Raya
        </title>
    </head>
    <body>
        <form method="get">
            Fila Origen: <input type="number" min="0" max ="2" name="filaOrigen">
            Columna Origen: <input type="number" min="0" max ="2" name="columnaOrigen"> <br/>

            Fila Destino: <input type="number" min="0" max ="2" name="filaDestino">
            Columna Destino: <input type="number" min="0" max ="2" name="columnaDestino"> <br/>
            
                

            <table border="1">
                <?php

                // podría haber trabajado con un array usando explode(' ', $_get('tablero'));
                $strTablero = $_GET["tablero"]??"BBBBBBBBB"; // valores de las casillas
                $intFilaOrigen = $_GET["filaOrigen"]??-1;
                $intFilaDestino = $_GET["filaDestino"]??-1;
                $intColumnaOrigen = $_GET["columnaOrigen"]??-1;
                $intColumnaDestino = $_GET["columnaDestino"]??-1;
                $blnPoneX = false;

                //voy a poner la ficha X en la ubicación que me pidan si se puede
                // si los valores no están fuera de rango
                if($intFilaDestino!=null && $intFilaDestino>=0 && $intFilaDestino<=2 &&
                   $intColumnaDestino!=null && $intColumnaDestino>=0 && $intColumnaDestino<=2){
                    //si el destino está vacío podré mover
                    if($strTablero[$intFilaDestino * 3 + $intColumnaDestino ]=='B') {
                        if (substr_count($strTablero, 'X') < 3) {//si hay menos de tres fichas, la muevo
                            $strTablero[$intFilaDestino * 3 + $intColumnaDestino] = 'X';
                            $blnPoneX = true;
                        }else if(null == $intFilaOrigen || null == $intColumnaOrigen) // si hay tres fichas y no indico origen, no puedo moverla
                                    echo "Tienes que indicar el origen, ya que tienes tres fichas sacadas";
                                  //si la ficha origen no es mía, no la puedo mover
                             else if (isset($strTablero[($intFilaOrigen * 3 + $intColumnaOrigen)]) && $strTablero[($intFilaOrigen * 3 + $intColumnaOrigen)] == 'X') {
                                        $strTablero[$intFilaDestino * 3 + $intColumnaDestino] = 'X';
                                        $blnPoneX = true;
                                        $strTablero[($intFilaOrigen * 3 + $intColumnaOrigen)] = 'B';
                                } else
                                        echo "No puedes mover una ficha que no es tuya";
                    }else
                        echo "No puedes poner una ficha en un sito ocupado";

                }else if(isset($_GET["filaDestino"])) {//Si es la primera vez que llamo, no indico error
                            if ($intFilaDestino == null || $intColumnaDestino == null)
                                echo "Debes indicar algún valor para la FILA y COLUMNA destino";
                            else
                                echo "Fila $intFilaDestino o Columna Destino $intColumnaDestino fuera de rango (0 a 2)";
                }

                //muevo O, si se ha movido X
                //Busco una posición de destino vacía
                if($blnPoneX) {
                    do {
                        $intFilaDestino = rand(0, 2);
                        $intColumnaDestino = rand(0, 2);
                    } while ($strTablero[$intFilaDestino * 3 + $intColumnaDestino] != 'B');
                    //Si no tengo 3 fichas sacadas, busco una posición origen aleatoria
                    if (substr_count($strTablero, 'O') == 3) {
                        $intFilaOrigen = $intColumnaOrigen = -1; // para inicializarlas fuera del rango
                        while ($strTablero[($intFilaOrigen = rand(0, 2)) * 3 + ($intColumnaOrigen = rand(0, 2))] != 'O') ;// busco una ficha origen a mover
                        $strTablero[$intFilaOrigen * 3 + $intColumnaOrigen] = 'B'; // quito la ficha
//echo "he quitado fila $intFilaOrigen columna $intColumnaOrigen y he puesto fila $intFilaDestino columna $intColumnaDestino";
                    }
                    $strTablero[$intFilaDestino * 3 + $intColumnaDestino] = 'O'; //pongo la ficha
                }



                //compruebo si ha ganado alguno
                $chrGanador = 'B';
                for($intCont=0;$intCont<2 && $chrGanador == 'B';$intCont++) {
                    $chrAux = $intCont==0?'X':'O';
                    if(($strTablero[0]==$chrAux && $strTablero[0]==$strTablero[1] && $strTablero[1]==$strTablero[2]) || //fila1
                        ($strTablero[3]==$chrAux && $strTablero[3]==$strTablero[4] && $strTablero[4]==$strTablero[5]) || //fila2
                        ($strTablero[6]==$chrAux && $strTablero[6]==$strTablero[7] && $strTablero[7]==$strTablero[8]) || //fila3
                        ($strTablero[0]==$chrAux && $strTablero[0]==$strTablero[3] && $strTablero[3]==$strTablero[6]) || //columna1
                        ($strTablero[1]==$chrAux && $strTablero[1]==$strTablero[4] && $strTablero[4]==$strTablero[7]) || //columna2
                        ($strTablero[2]==$chrAux && $strTablero[2]==$strTablero[5] && $strTablero[5]==$strTablero[8]) || //columna3
                        ($strTablero[0]==$chrAux && $strTablero[0]==$strTablero[4] && $strTablero[4]==$strTablero[8]) || //diagonal1
                        ($strTablero[2]==$chrAux && $strTablero[2]==$strTablero[4] && $strTablero[4]==$strTablero[6]) ) //diagonal2
                        $chrGanador=$chrAux;
                }
                if($chrGanador != 'B')
                        echo "<h1> Ha ganado $chrGanador</h1>";
                    else
                        echo "<p><input type='submit' value='mover'></p>";
                
                //imprime el tablero
                echo "<table border='1'>\n";
                for($intFila=0;$intFila<3;$intFila++) {
                        echo "\t<tr>\n";
                        for ($intColumna = 0; $intColumna < 3; $intColumna++) {
                            $chrCaracter=$strTablero[$intFila * 3 + $intColumna ]??'B'; // si no he cogido el valor del tablero entiende que está vacío al indicar la B
                            $chrCaracter=$chrCaracter == 'B' ? '&nbsp;&nbsp;&nbsp;':$chrCaracter;
                            echo "\t\t<td>$chrCaracter</td>\n";
                        }
                        echo "\t</tr>\n";
                }
                echo "</table>\n";


                echo "<input type='hidden' name='tablero' value='$strTablero'>";
                ?>

        </form>
    </body>
</html>