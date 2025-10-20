<?php
    /*Escribe un programa que, dada una posición en un tablero de 
    ajedrez, nos diga a qué casillas podría saltar un alfil que se 
    encuentra en esa posición. Indícalo de forma gráfica sobre el 
    tablero con un color diferente para estas casillas donde puede 
    saltar la figura. El alfil se mueve siempre en diagonal. El tablero 
    cuenta con 64 casillas. Las columnas se indican con las letras de la 
    "a" a la "h" y las filas se indican del 1 al 8.*/

    if(isset($_GET['fila']) && isset($_GET['columna'])) {
        $intFilaUsuario = $_GET['fila'];
        $strColumnaUsuario = strtolower(trim($_GET['columna']));

        $strColumnas = ['', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];

        //For para sacar la posicion de la columna del usuario, con esto,
        //hacemos una formula para sacar la posicion inicial de las filas.
        $intIndiceColumna = 0;
        for($intCont=0;$intCont<count($strColumnas);$intCont++) {
            if($strColumnaUsuario === $strColumnas[$intCont]) {
                $intIndiceColumna = $intCont;
            }
        }

        $intInicialFila = max(1, $intFilaUsuario - $intIndiceColumna + 1);
        $intInicialColumna = $intInicialFila - $intFilaUsuario + $intIndiceColumna; 
        $intInicialFila2 = max(1,$intFilaUsuario + $intIndiceColumna - 8); //Max de Columna = 8.
        $intInicialColumna2 = $intFilaUsuario + $intIndiceColumna -$intInicialFila2;

        echo "<table border =1>";
        for($intFila=1;$intFila<=8;$intFila++) {
            echo "<tr>";
            for($intColumna=1;$intColumna<=8;$intColumna++) {
                if($intFila == $intFilaUsuario && $intColumna == $intIndiceColumna) {
                    echo "<td><img src='alfil.png' alt='imagen-alfil' width=25px height=25px></td>";
                    if($intFila == $intInicialFila && $intColumna == $intInicialColumna) {
                        $intInicialFila++;
                        $intInicialColumna++;
                    }
                    if($intFila == $intInicialFila2 && $intColumna == $intInicialColumna2) {
                        $intInicialFila2++;
                        $intInicialColumna2--;
                    }
                } elseif ($intFila == $intInicialFila && $intColumna == $intInicialColumna) {
                    echo "<td style='background-color: purple;width:25px;height:25px;'></td>";
                    $intInicialFila++;
                    $intInicialColumna++;
                } elseif ($intFila == $intInicialFila2 && $intColumna == $intInicialColumna2) {
                    echo "<td style='background-color: purple;width:25px;height:25px;'></td>";
                    $intInicialFila2++;
                    $intInicialColumna2--;
                } else {
                    //Para pintar el tablero en blanco y negro.
                    if(($intFila + $intColumna) % 2 == 0) {
                        echo "<td style='background-color:black;width:25px;height:25px;'></td>";
                    } else {
                        echo "<td style='width:25px;height:25px;'></td>";
                    }
                } 
            }
            echo "</tr>";
        }
        echo "</table>";
    }


?>