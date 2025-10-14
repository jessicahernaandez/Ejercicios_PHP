<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
        //Creamos un array con la cartas de la baraja española
        $BarajaEspañola = ['AsOro', '2Oro', '3Oro', '4Oro', '5Oro', '6Oro', '7Oro', 'SotaOro', 'CaballoOro', 'ReyOro',
                            'AsCopa', '2Copa', '3Copa', '4Copa', '5Copa', '6Copa', '7Copa', 'SotaCopa', 'CaballoCopa', 'ReyCopa',
                           'AsEspada', '2Espada', '3Espada', '4Espada', '5Espada', '6Espada', '7Espada', 'SotaEspada', 'CaballoEspada', 'ReyEspada',
                            'AsBasto', '2Basto', '3Basto', '4Basto', '5Basto', '6Basto', '7Basto', 'SotaBasto', 'CaballoBasto', 'ReyBasto'
                        ];

        $PuntosAsociados = [];

        //Puntos correspondientes As->11, 3->10, Rey->4, Caballo->3, Sota->2.
        
        //Asociamos los puntos a sus respectivas cartas.
        foreach($BarajaEspañola as $Carta) {
            if(strpos($Carta,"As") === 0) {
                $PuntosAsociados[$Carta] = 11;
            } else if (strpos($Carta,"3") === 0) {
                $PuntosAsociados[$Carta] = 10;
            } else if (strpos($Carta,"Rey") === 0) {
                $PuntosAsociados[$Carta] = 4;
            } else if (strpos($Carta,"Caballo") === 0) {
                $PuntosAsociados[$Carta] = 3;
            } else if (strpos($Carta,"Sota") === 0) {
                $PuntosAsociados[$Carta] = 2;
            } else {
                $PuntosAsociados[$Carta] = 0;
            }
        }

        echo "Cartas y sus puntos asociados: <br />";
        foreach($PuntosAsociados as $key => $value) {
            echo "<strong>$key: </strong>";
            echo " $value, ";
        }

        //Ahora las desordenamos.
        //Podemos hacerlo con la funcion shuffle.
        shuffle($BarajaEspañola);
        echo "<br/><br/>Barajeando cartas...<br/>";
        foreach($BarajaEspañola as $Carta) {
            echo "$Carta, ";
        }

        //Podemos hacerlo manual, utilizando un bucle.
        for($intCont=count($BarajaEspañola)-1;$intCont>=0;$intCont--) {
            $indiceAleatorio = rand(0,$intCont);
            $intAux = $BarajaEspañola[$indiceAleatorio];
            $BarajaEspañola[$indiceAleatorio] = $BarajaEspañola[$intCont];
            $BarajaEspañola[$intCont] = $intAux;   
        }

        echo "<br/><br/>Repartiendo cartas...<br/>";
        foreach($BarajaEspañola as $Carta) {
            echo "$Carta, ";
        }

        //Ahora solo nos quedamos co 10 cartas.
        $CartasUsuario = [];
        $intPuntos = 0;

        for($intCont=0;$intCont<=10;$intCont++) {
            $CartasUsuario[] = [$BarajaEspañola[$intCont] => $PuntosAsociados[$BarajaEspañola[$intCont]]];
            $intPuntos = $intPuntos + $PuntosAsociados[$BarajaEspañola[$intCont]];
        }

        echo "<br/><br/>Tus cartas y puntos:<br/><br/>";
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Cartas</th>";
        echo "<th>Puntos</th>";
        echo "<tr>";
        foreach($CartasUsuario as $Carta) {
            foreach($Carta as $key => $value)
                echo "<tr>";
                echo "<td style='text-align:center;'>$key</td>";
                echo "<td style='text-align:center;'>$value</td>";
                echo "<tr>";
        }

        echo "<tfoot>";
        echo "<td style='text-align:center;'><strong>Puntos Totales</strong></td>";
        echo "<td style='text-align:center;'><strong>$intPuntos</strong></td>";
        echo "</tfoot>";

    
    ?>
</body>
</html>