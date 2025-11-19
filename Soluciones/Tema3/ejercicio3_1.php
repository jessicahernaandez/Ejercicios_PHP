<html>

    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	</head>

    <body>
		<form action="ejercicio3_1.php" method="get">
			<select name="dia" id="dia">
<!--Con esto obligo a que seleccione un día, sino no funciona-->
				<option value='0'>Día</option>
				<?php 
					for($intCont=1;$intCont<32;$intCont++)
						echo "<option value='$intCont'>$intCont</option>";
				?>
			</select>
			
			&nbsp;
			<label for="mes">Mes</label>
			<select name="mes" id="mes">
			<?php 
				for($intCont=1;$intCont<13;$intCont++)
					echo "<option value='$intCont'>$intCont</option>";
			?>
			</select>
      
			&nbsp;
			<label for="anio">A&ntilde;o</label>
			<select name="anio" id="anio">
			<?php 
				for($intCont=1990;$intCont<2025;$intCont++)
					echo "<option value='$intCont'>$intCont</option>";
			?>
			</select>
			
			&nbsp;<input type="submit" name="Enviar"></p>
        </form>
        <?php
			if (isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["anio"])) {
//no es necesario poner la condicción, ya que va a tener el valor 0. Si llamo desde otro formulario podía fallar 
//lo normal es poner la asignación del año con ??
				$intDia = $_GET['dia']?:0;
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
			} else 
				echo "No has metido la fecha";
        ?>
    </body>

</html>