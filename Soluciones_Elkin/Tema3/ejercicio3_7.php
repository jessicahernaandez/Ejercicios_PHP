<html>

    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Ejercicio3.7</title>
	</head>

    <body>
			<?php
				$intNumero=$_GET["intNumero"]??0;

				if ($intNumero<1){
					echo '<form action="ejercicio3_7.php" method="get">';
					echo '	Ancho del rombo: <input type="text" name="intNumero"> <br />';
					echo '	<input type="submit" name="Enviar">';
					echo '</form>';
				}else{//si me ha puesto valor imprimo el rombo
					echo '<table>';
                    //imprimo las líneas del primer triángulo
					for($intLinea=1; $intLinea<=$intNumero; $intLinea++){
                        echo '<tr>';

                        //imprimo los blancos
						for($intBlancos=$intNumero-$intLinea; $intBlancos>0; $intBlancos--)
								echo '<td> </td>';

                        echo '<td>*</td>';//imprimo el asterisco

                        //imprimo blancos interior
                        for($intAsteriscos=2*$intLinea-3; $intAsteriscos>0; $intAsteriscos--)
								echo '<td> </td>';

                        if($intLinea!=1)
                            echo '<td>*</td>';//imprimo el asterisco
						echo '</tr>';//cierro la fila
					}

                    //imprimo las líneas del segundo triángulo
                    for($intLinea=$intNumero-1; $intLinea>0; $intLinea--){
                        echo '<tr>';

                        //imprimo los blancos
                        for($intBlancos=$intNumero-$intLinea; $intBlancos>0; $intBlancos--)
                            echo '<td> </td>';

                        echo '<td>*</td>';//imprimo el asterisco

                        //imprimo blancos interior
                        for($intAsteriscos=2*$intLinea-3; $intAsteriscos>0; $intAsteriscos--)
                            echo '<td> </td>';

                        if($intLinea!=1)
                            echo '<td>*</td>';//imprimo el asterisco
                        echo '</tr>';//cierro la fila
                    }

                    echo '<table>';
				}
			?>
    </body>

</html>