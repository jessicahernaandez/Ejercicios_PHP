<html>

    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Ejercicio3.3</title>
	</head>

    <body>
		<?php
			$intNumero=$_GET["intNumero"]??0;
			if ($intNumero<=0){
				echo '<form action="ejercicio3_3.php" method="get">';
				echo '	Tamaño: <input type="text" name="intNumero">';
				echo '	<input type="submit" name="Enviar">';
				echo '</form>';
			}else{//si me ha puesto valor imprimo el triángulo
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
        ?>
    </body>

</html>