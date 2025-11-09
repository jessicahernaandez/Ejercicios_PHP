<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <select name="dia">
            <option value="0">Día</option>
            <?php 
                for($intDia=1;$intDia<=31;$intDia++) {
                    echo "<option value='$intDia'>$intDia</option>";
                }
            ?>
        </select>

        <label for="mes">Mes</label>
        <select name="mes">
            <?php 
                for($intCont=1;$intCont<=12;$intCont++) {
                    echo "<option value='$intCont'>$intCont</option>";
                }
            ?>
        </select>

        <label for="anio">Año</label>
        <select name="anio">
            <?php 
                for($intCont=1990;$intCont<=2025;$intCont++) {
                    echo "<option value='$intCont'>$intCont</option>";
                }
            ?>
        </select>

        <input type="submit" name="enviar">
    </form>

    <?php 
        if (isset($_GET["dia"]) && isset($_GET["mes"]) && isset($_GET["anio"])) {
				$intDia = $_GET['dia'];
				$intMes = $_GET['mes'];
				$intAnio = $_GET['anio'];
				$intMaxDias = 31;
				
                switch($intMes){
					case 4:
					case 6:
					case 9:
					case 11:
						$intMaxDias = 30;
						break;
					case 2:
						$intMaxDias = 28;
				}
				    
                if($intMaxDias>=$intDia) {
                    echo "<br />  Fecha $intDia/$intMes/$intAnio";
                } else {
                    echo "La fecha no es correcta";
                }
						
		} else {
            echo "Tienes que introducir en los 3 campos";
        }
					
			
    
    ?>
</body>
</html>