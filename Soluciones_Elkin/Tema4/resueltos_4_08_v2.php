<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.08</title>
		<style type="text/css">
		  table, th, td {
			border: 1px;
			text-align: center;
		  }
		  td.negro {
			background-color: black;
		  }
		  td.blanco {
			background-color: white;
		  }
		  td.rojo {
			background-color: red;
		  }
		  .azul {
			background-color: lightblue;
		  }
		</style>
	</head>
    <table>

        <form  method="get">

            <p><label for='fila'>Fila 1 a 8: </label>
                <input type='text' name='fila'></p>
            <p><label for='columna'>Columna a a h: </label>
                <input type='text' name='columna'></p>
            <p><input type="submit" value="enviar"></p>

        </form>

				<?php
					$intFilaAlfil = isset($_GET["fila"]) && !empty($_GET["fila"])?$_GET["fila"]:0;
					$intColumnaAlfil = isset($_GET["columna"]) && !empty($_GET["columna"])?$_GET["columna"]:0;
                    if($intFilaAlfil!=0 && $intColumnaAlfil!=0 && //me ha pasado la fila y la columna
                        $intFilaAlfil>=1 && $intFilaAlfil<=8 && //valores de fila correctos
                        $intColumnaAlfil>='a' && $intColumnaAlfil<='h') {
                        $intArrAux = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8];
                        $intColumnaAlfil = $intArrAux[$intColumnaAlfil];

                        //relleno el array de blanco y negro
                        $strArrAux = [];
                        for($intFila=1;$intFila<9;$intFila++) {
                            $strColor = $intFila % 2 == 0 ? 'blanco' : 'negro'; // filas impares empiezan por negro y pares por blanco
                            //$strArrAux[$intFila][0] = 'azul'; // la primera columna va en azul
                            for ($intColumna = 1; $intColumna < 9; $intColumna++) {
                                $strArrAux[$intFila][$intColumna] = $strColor;
                                $strColor = $strColor == 'negro' ? 'blanco' : 'negro'; // si es negro pasa a blanco y si es blanco pasa a negro
                            }
                        }

                        /* relleno los fondos de rojo */
                        $strArrAux[$intFilaAlfil][$intColumnaAlfil] = 'rojo';//pinto la posición elegida de rojo
                        //pinto la diagonal izquierda superior
                        for($intFila=$intFilaAlfil-1, $intColumna = $intColumnaAlfil -1;$intFila>0 && $intColumna>0;$intFila--, $intColumna--)
                            $strArrAux[$intFila][$intColumna] = 'rojo';
                        //pinto la diagonal derecha superior
                        for($intFila=$intFilaAlfil-1, $intColumna = $intColumnaAlfil + 1;$intFila>0 && $intColumna<9;$intFila--, $intColumna++)
                            $strArrAux[$intFila][$intColumna] = 'rojo';
                        //pinto la diagonal izquierda inferior
                        for($intFila=$intFilaAlfil+1, $intColumna = $intColumnaAlfil -1;$intFila<9 && $intColumna>0;$intFila++, $intColumna--)
                            $strArrAux[$intFila][$intColumna] = 'rojo';
                        //pinto la diagonal derecha inferior
                        for($intFila=$intFilaAlfil+1, $intColumna = $intColumnaAlfil + 1;$intFila<9 && $intColumna<9;$intFila++, $intColumna++)
                            $strArrAux[$intFila][$intColumna] = 'rojo';

                        //imprime el tablero de juego
                        echo '<table>';
                        echo "<tr class='azul'><td></td><td>a</td><td>b</td><td>c</td><td>d</td><td>e</td><td>f</td><td>g</td><td>h</td></tr>\n";
                        for($intFila=1;$intFila<9;$intFila++) {
                            echo "<tr><td class='azul'>$intFila</td>\n";
                            for ($intColumna = 1; $intColumna < 9; $intColumna++)
                                echo "<td class='". $strArrAux[$intFila][$intColumna] ."'>&nbsp;</td>\n";;
                            echo "</tr>\n";
                        }

                    }
				?>
        </table>
    </body>
</html>