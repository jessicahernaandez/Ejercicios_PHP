<html>

    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Ejercicio3.6</title>
	</head>

    <body>
		<pre>
			<?php
				$intNumero=$_GET["intNumero"]??0;
				$intRepeticiones=$_GET["intRepeticiones"]??1;//si no me da valor imprimo uno
				$intRepeticiones=$intRepeticiones==''?1:$intRepeticiones;

				if ($intNumero<1){
					echo '<form action="ejercicio3_6.php" method="get">';
					echo '	Lineas del Triángulo: <input type="text" name="intNumero"> <br />';
					echo '	Cantidad: <input type="text" name="intRepeticiones"> <br />';
					echo '	<input type="submit" name="Enviar">';
					echo '</form>';
				}else{//si me ha puesto valor imprimo el triángulo
					echo '<br />';
					//imprimo las líneas de los triángulos
					for($intLinea=1; $intLinea<=$intNumero; $intLinea++){
						//repito en la misma línea tantos triángulos como me indiquen
						for($intCantidad=$intRepeticiones; $intCantidad>0;$intCantidad--){
							//imprimo los blancos
							for($intBlancos=$intNumero-$intLinea; $intBlancos>0; $intBlancos--)
									echo '&nbsp;';
							//imprimo los asteriscos
							for($intAsteriscos=2*$intLinea-1; $intAsteriscos>0; $intAsteriscos--)
									echo '*';
							//imprimo los blancos del final
							for($intBlancos=$intNumero-$intLinea; $intBlancos>0; $intBlancos--)
									echo '*';
							echo '&nbsp;';//para que se vean mejor los triángulos individuales
						}
						echo '<br />';
					}
				}
			?>
		</pre>
    </body>

</html>