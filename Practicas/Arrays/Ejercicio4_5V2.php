<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        //Cambio algunas cosas del ejercicio4_5.
        $BarajaEspañola= [['Oro' => ['AsOro', '2Oro', '3Oro', '4Oro', '5Oro', '6Oro', '7Oro', 'SotaOro', 'CaballoOro', 'ReyOro']],
                            ['Copa' => ['AsCopa', '2Copa', '3Copa', '4Copa', '5Copa', '6Copa', '7Copa', 'SotaCopa', 'CaballoCopa', 'ReyCopa']],
                            ['Espada' => ['AsEspada', '2Espada', '3Espada', '4Espada', '5Espada', '6Espada', '7Espada', 'SotaEspada', 'CaballoEspada', 'ReyEspada']],
                            ['Basto' => ['AsBasto', '2Basto', '3Basto', '4Basto', '5Basto', '6Basto', '7Basto', 'SotaBasto', 'CaballoBasto', 'ReyBasto']]
                        ];

        echo "Baraja Española: <br/>";
        foreach($BarajaEspañola as $Palo) {
            foreach($Palo as $key => $value) {
                echo "<strong>$key: </strong>";
                foreach($value as $valores) {
                    echo "$valores, ";
                }
            }
            echo "<br />";
        }

        //Asociar los puntos a cada carta.
        $puntosAsociados = [];
        foreach($BarajaEspañola as $Palo) {
            foreach($Palo as $key => $value) {
                foreach($value as $valores) {
                    if(str_starts_with($valores, 'As')){
                        $puntosAsociados[$valores] = 11;
                    } else if (str_starts_with($valores, '3')) {
                        $puntosAsociados[$valores] = 10;
                    } else if (str_starts_with($valores, 'Rey')) {
                        $puntosAsociados[$valores] = 4;
                    } else if (str_starts_with($valores, 'Caballo')) {
                        $puntosAsociados[$valores] = 3;
                    } else if (str_starts_with($valores, 'Sota')) {
                        $puntosAsociados[$valores] = 2;
                    } else {
                        $puntosAsociados[$valores] = 0;
                    }
                }
            }

        }


        echo "<br /><br />Cartas y sus puntos asociados: <br />";
        foreach($puntosAsociados as $key => $value) {
            echo "<strong>$key: </strong>$value,&nbsp;&nbsp;";
        }

        //Desordenamos las cartas manualmente.
        //COMPROBAR ESTO: A veces se duplica 2 veces la misma baraja.
        foreach($BarajaEspañola as &$Palo) {
            foreach($Palo as $key => &$value) { //Al agregarle el '&' justo antes del array de cartas hace que 'value' sea u puntero al original y el shuffle lo cambia de verdad.
                shuffle($value);
            }
        }
        

        shuffle($BarajaEspañola); //los 4 palos.

        echo "<br /><br />Mezclando cartas...<br />";
        foreach($BarajaEspañola as $Palo) {
            foreach($Palo as $key => $value) {
                echo "<strong>$key: </strong>";
                foreach($value as $valores) {
                    echo "$valores, ";
                }
            }
            echo "<br />";
        }

        //Elegimos 10 cartas 
        $CartasUsuario = [];
        while(count($CartasUsuario) < 10) {
            $PaloAleatorio = rand(0,3);
            $SubPaloArr = $BarajaEspañola[$PaloAleatorio]; //Ahora estoy accediendo a ['Oro', 'Copa'...];

            foreach($SubPaloArr as $CartasDelPalo) { //Ahora estoy en las cartas del Palo elegido.
                $CartaAleatorio = rand(0,9);
                $CartaElegida = $CartasDelPalo[$CartaAleatorio];

                if(!isset($CartasUsuario[$CartaElegida])) { //Verifico que no este en el array.
                    $CartasUsuario[$CartaElegida] = $puntosAsociados[$CartaElegida];
                }
            }
        }

        $puntosTotales = 0;
        echo "<br /><br />Tus cartas:";
        echo "<table border=1>";
        echo "<tr><th>Cartas</th>";
        echo "<th>Puntos</th></tr>";
        foreach($CartasUsuario as $key => $Puntos) {
            echo "<tr '>";
            echo "<td style='text-align:center;'>$key</td>";
            echo "<td style='text-align:center;'>$Puntos</td>";
            echo "</tr>";
            $puntosTotales = $puntosTotales + $Puntos;
        }

        echo "<tfoot style='text-align:center;'><td><strong>Puntos Totales</strong></td>";
        echo "<td><strong>$puntosTotales</strong></td></tfoot>";
        echo "</table>";
        


    
    ?>
</body>
</html>