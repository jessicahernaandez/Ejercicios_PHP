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
					$intColumnaAlfil = isset($_GET["columna"]) && !empty($_GET["columna"])?$_GET["columna"]:'0';
                    echo "fila $intFilaAlfil columna $intColumnaAlfil<br>";
                    if($intFilaAlfil!=0 && $intColumnaAlfil!='0' && //me ha pasado la fila y la columna
                        $intFilaAlfil>=1 && $intFilaAlfil<=8 && //valores de fila correctos
                        $intColumnaAlfil>='a' && $intColumnaAlfil<='h') {
                        $intArrAux = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => 6, 'g' => 7, 'h' => 8];
                        $intColumnaAlfil = $intArrAux[$intColumnaAlfil];
                        echo '<table>';
                        echo '<tr class="azul"><td></td><td>a</td><td>b</td><td>c</td><td>d</td><td>e</td><td>f</td><td>g</td><td>h</td></tr>';
                            for($intFila=1;$intFila<9;$intFila++) { //recorro las filas
                                $strColor = $intFila % 2 == 0 ? 'blanco' : 'negro';// Lo pongo alreves para que con el cambio coincida
                                $intDesplazamiento = abs($intFila - $intFilaAlfil);//desplazamiento con respecto a la fila
                                echo "<tr><td class=\"azul\">$intFila</td>";
                                for ($intColumna = 1; $intColumna < 9; $intColumna++) {
                                    $strColor = $strColor == 'negro' ? 'blanco' : 'negro'; // cambio color respecto a la casilla anterior
                                    $intDesplazamiento = abs($intFila - $intFilaAlfil);//nº de movimientos que se han hecho con el alfil
                                    echo "<td class='";
                                    if (($intFilaAlfil != 0 && $intColumnaAlfil != 0) && //me ha dado un valor válido
                                        ($intFilaAlfil == $intDesplazamiento + $intFila || $intFilaAlfil == $intFila - $intDesplazamiento) && //la fila es correcta
                                        ($intColumnaAlfil == $intColumna + $intDesplazamiento || $intColumnaAlfil == $intColumna - $intDesplazamiento)) // columna ok
                                        echo "rojo";
                                    else
                                        echo "$strColor";
                                    echo "'>&nbsp;</td>";
                                }
                                echo "</tr>";
                            }
                    }
				?>
        </table>
    </body>
</html>