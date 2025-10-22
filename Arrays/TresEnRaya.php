<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tres en Raya</title>
    <style>
        .tabla {
            border-collapse: collapse;
        }
        .header {
            width: 25px; 
            height: 25px; 
            text-align: center; 
            border: none;
        }
        .celda {
            width: 50px; 
            height: 50px; 
            text-align:center; 
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h3>¡Juego de tres en raya!</h3>
    <p>-Indica la fila y columna a la que te quieras mover.</p>
    <p>-Si tienes mas de una ficha en el tablero, especifica su origen.</p>


    <table>
    <form action="TresEnRaya.php" method="get">
        <tr>
        <td><label for="fila"><strong>Introduce una fila: </strong></label></td>
            <td><input type="text" name="fila"></td>
        </tr>
        <tr>
        <td><label for="columna"><strong>Introduce una columna: </strong></label></td>
            <td><input type="text" name="columna"></td>
        </tr>
        <tr>
        <td><label for="origen"><strong>Introduce el origen: </strong></label></td>
            <td><input type="text" name="origen"></td>
        </tr>
        <tr>
        <td><label for="destino"><strong>Introduce el destino: </strong></label></td>
            <td><input type="text" name="destino"></td>
        </tr>
    </table>
    <br>
        <input type="submit" name="enviar">
    <br>
    <?php 

    //Representacion del tablero.
    $tablero = [
        1 => [1 =>'-',2 =>'-',3 => '-'],
        2 => [1 =>'-',2 =>'-',3 => '-'],
        3 => [1 =>'-',2 =>'-',3 => '-']
    ];

    if(isset($_GET['enviar']) && isset($_GET['fila']) && isset($_GET['columna'])) {
        $fichasEnTablero = 3;
        $filaUsuario = [$_GET['fila']];
        $columnaUsuario = $_GET['columna'];
        
        if($fichasEnTablero != 0) {
            for($intFila=1;$intFila<=3;$intFila++) {
                for($intColumna=1;$intColumna<=3;$intColumna++) {
                    if(isset($tablero[$_GET['fila']][$_GET['columna']]) && $tablero[$_GET['fila']][$_GET['columna']] == '-') {
                            $tablero[$intFila][$intColumna] = 'X';
                            $fichasEnTablero--;
                        }
                }
            }
        }

        echo $filasEnTablero;

        //Generar 'O'
        $filaMaquina = rand(1,3);
        $columnaMaquina = rand(1,3);
        while($tablero[$filaMaquina][$columnaMaquina] == '-') {
            $tablero[$filaMaquina][$columnaMaquina] = 'O';
        }
    }

        
        
        //Tablero
        echo "<table class='tabla'>";
        echo "<tr>
                <th class='header'> </th>  
                <th class='header'>1</th>
                <th class='header'>2</th>
                <th class='header'>3</th>
            </tr>";
        for($intFilas=1;$intFilas<=3;$intFilas++) {
            echo "<tr>";
            echo "<th class='header'>$intFilas</th>";
            for($intColumnas=1;$intColumnas<=3;$intColumnas++) {       
                echo "<td class='celda'>";
                echo $tablero[$intFilas][$intColumnas];  
                echo "</td class='celda'>";
            }
            echo "</tr>";
        }

        echo "<pre>";
        print_r($tablero);
        print_r($_GET);
        echo "</pre>";  

        $posicionesGanadoras = [
                                [1 => 1,2 => 2,3 => 3] , 
                                [3 => 1,2 => 2,1 => 3], 
                                [1 => 2,2 => 2, 3 => 1],
                                [3 => 2,2 => 2,1 => 2]
                                ];

        echo "<pre>";
        print_r($posicionesGanadoras);
        echo "</pre>";

        //Prueba
        $tablero[1][2] = 'O'; 
        
    ?>
</body>
</html>