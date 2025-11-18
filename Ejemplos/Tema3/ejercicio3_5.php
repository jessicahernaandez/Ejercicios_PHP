<html>

    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Ejercicio3.5</title>
	</head>

    <body>
		<pre>
			<?php
				$intNumero=$_GET["intNumero"]??0;

				if ($intNumero<1){
					echo '<form action="ejercicio3_5.php" method="get">';
					echo '	Lineas del Triángulo: <input type="text" name="intNumero"> <br />';
					echo '	<input type="submit" name="Enviar">';
					echo '</form>';
				}else{//si me ha puesto valor imprimo el triángulo
					echo '<br />';//imprimo las líneas del primer triángulo
					for($intLinea=1; $intLinea<=$intNumero; $intLinea++){
						//imprimo los blancos
						for($intBlancos=$intNumero-$intLinea; $intBlancos>0; $intBlancos--)
								echo '&nbsp;';
						//imprimo los asteriscos
						for($intAsteriscos=2*$intLinea-1; $intAsteriscos>0; $intAsteriscos--)
								echo '*';
						echo '<br />';
					}
				}
			?>
		</pre>
    </body>

</html>