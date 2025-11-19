<html>

    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	</head>

    <body>
		<?php
			$intDia = isset($_GET['dia'])?$_GET['dia']:0;
			$intMes = isset($_GET['mes'])?$_GET['mes']:0;
			$intAnio = isset($_GET['anio'])?$_GET['anio']:0;
		?>
		<form action="ejercicio3_2.php" method="get">
			<select name="dia" id="dia">
				<option value='0'>Día</option>
				<?php 
				
					for($intCont=1;$intCont<32;$intCont++)
						echo "				<option value='$intCont'" . ($intCont==$intDia?' selected':'') . ">$intCont</option>" . PHP_EOL;
				?>
			</select>
			
			&nbsp;
			<select name="mes" id="mes">
				<option value='0'>Mes</option>
				<?php 
					for($intCont=1;$intCont<13;$intCont++)
						echo "				<option value='$intCont'" . ($intCont==$intMes?' selected':'') . ">$intCont</option>" . PHP_EOL;
				?>
			</select>
      
			&nbsp;
			<select name="anio" id="anio">
				<option value='0'>Año</option>
				<?php 
					for($intCont=1990;$intCont<2024;$intCont++)
						echo "				<option value='$intCont'" . ($intCont==$intAnio?' selected':'') . ">$intCont</option>" . PHP_EOL;
				?>
			</select>
			
			&nbsp;<input type="submit" name="Enviar"></p>
        </form>
        <?php
			if (isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["anio"])) {
				$intDia = $_GET['dia'];
				$intMes = $_GET['mes']?:0;
				$intAnio = $_GET['anio']?:0;
				$intMaxDias = 31;
				if($intDia!=0 && $intMes!=0 && $intAnio!=0){
					switch($intMes){
						case 4:
						case 6:
						case 9:
						case 11:
							$intMaxDias = 30;
							break;
						case 2:
							$intMaxDias = 28;
							if($intAnio%4==0 && $intAnio%100!=0 && $intAnio%400!=0)
								$intMaxDias = 29;
					}
				    if($intMaxDias>=$intDia)
						echo "<br />  Fecha $intDia/$intMes/$intAnio";
					else
						echo "La fecha no es correcta";
				}else
					echo "Tienes que poner valor en día, mes y año";
			} else echo "No has metido la fecha";

        ?>
    </body>

</html>