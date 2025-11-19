<?php 
    $dia = $_GET["dias"] ?? 0;
    $mes = $_GET["mes"] ?? 0;
    $anio = $_GET["anio"] ?? 0;
?>

<form action="" method="get">

    <select name="dias">
        <option value="0">Día</option>
        <?php 
            for($intCont=1;$intCont<=31;$intCont++) {
                echo "<option value='$intCont' " . ($intCont==$dia ? 'selected' : ' ') . ">$intCont</option>";
            }
        ?>
    </select>

    <label for="mes">Mes</label>
    <select name="mes">
        <?php 
            for($intCont=1;$intCont<=12;$intCont++) {
                echo "<option value='$intCont' " . ($intCont==$mes ? 'selected' : ' ') . ">$intCont</option>";
            }
        ?>
    </select>

    <label for="anio">Año</label>
    <select name="anio">
        <?php 
            for($intCont=1990;$intCont<=2025;$intCont++) {
                echo "<option value='$intCont' " . ($intCont==$anio ? 'selected' : ' ') . ">$intCont</option>";
            }
        ?>
    </select>

    <input type="submit" name="enviar">
</form>

<?php 

    $titulo = "Fechas";
    include("cabecera.inc.php");

    if(isset($_GET["dias"]) && isset($_GET["mes"]) &&isset($_GET["anio"])) {
        $dia = $_GET["dias"] ?? 0;
        $mes = $_GET["mes"] ?? 0;
        $anio = $_GET["anio"] ?? 0;

        $diasMaximos=31;
        switch($mes) {
            case 4:
            case 6:
            case 9:
            case 11:
                $diasMaximos = 30;
                break;
            case 2:
                $diasMaximos = 28;
        }

        if ($dia > $diasMaximos) {
            echo "Fecha incorrecta.";
        } else {
            echo "Tu fecha solicitada ha sido: $dia/$mes/$anio";
        }

    } else {
        echo "No has seleccionado los 3 valores.";
    }



?>