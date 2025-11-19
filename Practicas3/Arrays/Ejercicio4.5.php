<?php 

    $arrPalos = ['Oro', 'Copa', 'Espada', 'Bastos'];
    $arrCartas = ['As', '2', '3', '4', '5', '6', '7', 'Sota', 'Caballo', 'Rey'];
    $puntosAsociados = ['As' => 11, 'Sota' => 2, 'Caballo' => 3, 'Rey' => 4];

    //Me creo un array temporal donde ire guardando las cartas, asi compruebo que no esten repetidas.
    $arrMazoTemporal = [];
    $arrMazoJugador = [];
    $puntosJugador = 0;

    //Hago un for donde guardo las 10 cartas.
    for($intCont=0, $intCartas=0;$intCartas<10;$intCont++) {
        $carta = $arrCartas[rand(0,9)];
        $palo = $arrPalos[rand(0,3)];
        if(!in_array($carta.$palo,$arrMazoTemporal)) {
            $arrMazoTemporal[] = $carta.$palo;
            $intCartas++;

            $puntos = isset($puntosAsociados[$carta]) ? $puntosAsociados[$carta] : 0;
            $arrMazoJugador[$carta.$palo] = $puntos;
            $puntosJugador += $puntos;
        }
    }

    //Mostramos los datos.
    echo "Tus cartas al azar y sus respectivos puntos asociados:<br/>";

    echo "<table border=1>";
    echo "<tr>";
    echo "<th>Cartas</th>";
    echo "<th>Puntos</th>";
    echo "</tr>";
    foreach($arrMazoJugador as $carta => $puntos) {
        echo "<tr>";
        echo "<td>$carta</td>";
        echo "<td>$puntos</td>";
        echo "</tr>";
    }
    echo "<foot>";
    echo "<td>Puntos Totales:</td>";
    echo "<td>$puntosJugador</td>";
    echo "</foot>";
    echo "</table>";


?>