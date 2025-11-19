<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tetris con checkbox</title>
</head>
<body>
<form method="get">

<?php

$tableroLineasIncompletas = [];
$filasCompletas = 0;

for ($i = 0; $i < 10; $i++) {
    if (isset($_GET['tablero'][$i]) && count($_GET['tablero'][$i]) == 10) {  
        $filasCompletas++;
    } else {
        $tableroLineasIncompletas[] = $_GET['tablero'][$i] ?? [];
    }
}

$tableroFilasVacias = array_fill(0, $filasCompletas, []); 
$tableroFinal = array_merge($tableroFilasVacias, $tableroLineasIncompletas); 

echo "<table border='1'>";
for ($i = 0; $i < 10; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 10; $j++) {
        $checked = isset($tableroFinal[$i][$j]) ? "checked" : "";
        echo "<td><input type='checkbox' name='tablero[$i][$j]' $checked></td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
<br>
<input type="submit" value="enviar">
</form>
</body>
</html>
