<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        //Guardamos en un array la baraja española.
        $BarajaEspañola = ['AsOro', '2Oro', '3Oro', '4Oro', '5Oro', '6Oro', '7Oro', 'SotaOro', 'CaballoOro', 'ReyOro',
                            'AsCopa', '2Copa', '3Copa', '4Copa', '5Copa', '6Copa', '7Copa', 'SotaCopa', 'CaballoCopa', 'ReyCopa',
                            'AsEspada', '2Espada', '3Espada', '4Espada', '5Espada', '6Espada', '7Espada', 'SotaEspada', 'CaballoEspada', 'ReyEspada',
                            'AsBasto', '2Basto', '3Basto', '4Basto', '5Basto', '6Basto', '7Basto', 'SotaBasto', 'CaballoBasto', 'ReyBasto'
                        ];

        $PuntosAsociados = [];

        //Asociamos los puntos segun la carta en un array nuevo.
        //As: 11, 3: 10, Rey: 4, Caballo: 3, Sota: 2, Resto 0.
        foreach($BarajaEspañola as $Carta) {
            if(str_starts_with($Carta,"As")) {
                $PuntosAsociados[$Carta] = 11;
            } else if (str_starts_with($Carta,"3")) {
                $PuntosAsociados[$Carta] = 10;
            } else if (str_starts_with($Carta,"Rey")) {
                $PuntosAsociados[$Carta] = 4;
            } else if (str_starts_with($Carta,"Caballo")) {
                $PuntosAsociados[$Carta] = 3;
            } else if (str_starts_with($Carta,"Sota")) {
                $PuntosAsociados[$Carta] = 2;
            } else {
                $PuntosAsociados[$Carta] = 0;
            }
        }

        echo "Puntos asociados a las cartas: <br/>";
        foreach($PuntosAsociados as $key => $value) {
            echo "<strong>$key: </strong>";
            echo "$value, &nbsp;";
        }

        //Desordeno el array con la baraja utilizando la funcion shuffle.
        shuffle($BarajaEspañola);

        echo "</br></br> Barajeando cartas...</br>";
        foreach($BarajaEspañola as $cartas) {
            echo "$cartas, &nbsp;";
        }

        //Tambien puedo desordenarlos  con un bucle.
        for($intCont=count($BarajaEspañola)-1;$intCont>=0;$intCont--){
            $indiceAleatorio = rand(0,$intCont);
            $intAux = $BarajaEspañola[$indiceAleatorio];
            $BarajaEspañola[$indiceAleatorio] = $BarajaEspañola[$intCont];
            $BarajaEspañola[$intCont] = $intAux;
        }

        echo "</br></br>Repartiendo las cartas...</br>";
        foreach($BarajaEspañola as $cartas) {
            echo "$cartas, &nbsp;";
        }

        $MazoCartas = [];
        //Y ahora solo nos quedamos con 10 cartas.

        $intPuntos = 0;
        for($intCont=0;$intCont < 10;$intCont++) {
            $MazoCartas[] = [$BarajaEspañola[$intCont] => $PuntosAsociados[$BarajaEspañola[$intCont]]];
            $intPuntos = $intPuntos + $PuntosAsociados[$BarajaEspañola[$intCont]];
        }

        echo "</br></br>Tus cartas son:";
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Cartas</th>";
        echo "<th>Puntos</th>";
        echo "</tr>";
        foreach($MazoCartas as $Carta) {
            foreach($Carta as $key => $value) {
                echo "<tr>";
                echo "<td style='text-align:center;'>$key</td>";
                echo "<td style='text-align:center;'>$value</td>";
                echo "</tr>";
            }

        } 
     
        echo "<tfoot style='text-align:center;'><td><strong>Puntos Totales</strong></td>";
        echo "<td><strong>$intPuntos</strong></td></tfoot>";
        echo "</table>";


    ?>
</body>
</html>