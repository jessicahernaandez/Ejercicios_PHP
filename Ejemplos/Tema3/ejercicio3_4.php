<html>

    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Ejercicio3.4</title>
	</head>

    <body>
		<?php
			$intNumero=$_GET["intNumero"]??0;
			$intRepeticiones=$_GET["intRepeticiones"]??1;//si no me da valor imprimo uno
			$intRepeticiones=$intRepeticiones==''?1:$intRepeticiones;

			if ($intNumero<1){
				echo '<form action="ejercicio3_4.php" method="get">';
				echo '	Tamaño: <input type="text" name="intNumero"> <br />';
				echo '	Cantidad: <input type="text" name="intRepeticiones"> <br />';
				echo '	<input type="submit" name="Enviar">';
				echo '</form>';
			}else{//si me ha puesto valor imprimo el triángulo
				for($intTriangulos=1; $intTriangulos<=$intRepeticiones;$intTriangulos++){
					//imprimo las líneas del primer triángulo
					for($intLinea=1; $intLinea<=$intNumero; $intLinea++){
						//imprimo los asteriscos
						for($intCont=0; $intCont<$intLinea; $intCont++)
							echo '*';
						echo '<br />';
					}
					
					//segundo triángulo
					for($intLinea=$intNumero-1; $intLinea>0; $intLinea--){
						//imprimo los asteriscos
						for($intCont=0; $intCont<$intLinea; $intCont++)
							echo '*';
						echo '<br />';
					}
				}
			}
        ?>
    </body>

</html>