<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $arrPalo = ['Oro', 'Copa', 'Espada', 'Basto'];
        $arrCartas = ['As', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey'];
        $puntosAsociados = ['As' => 11, '3' => 10, 'Sota' => 2, 'Caballo' => 3, 'Rey' => 4];

        $arrMazo = [];
        $arrMazoJugador = [];
        $puntosJugador = 0;
        echo "Tus cartas y sus puntos asociados han sido:<br />";
        for($intCont=0, $intCartas=0;$intCartas<10;$intCont++) {
                $carta = $arrCartas[rand(0,9)];
                $palo = $arrPalo[rand(0,3)];
                if(!in_array($carta.$palo,$arrMazo)) {
                    $arrMazo[] = $carta.$palo;
                    $intCartas++;
                    $puntos = isset($puntosAsociados[$carta]) ? $puntosAsociados[$carta] : 0;

                    $arrMazoJugador[$carta.$palo] = $puntos; 
                    $puntosJugador += $puntos;
            }
        }

        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Cartas</th><th>Puntos</th>";
        echo "</tr>";
        foreach($arrMazoJugador as $key => $value) {
            echo "<tr>";
            echo "<td>$key</td>";
            echo "<td>$value</td>";
            echo "</tr>";

        }
        echo "<tr>";
        echo "<td>Puntos Totales</td><td>$puntosJugador</td>";
        echo "</tr>";
        echo "</table>";

        print_r($arrMazo);
        echo "<br />";
        print_r($arrMazoJugador);
    ?>
</body>
</html>