<?php 

    if(isset($_GET['fila']) && isset($_GET['columna'])) {
        $intFilaUsuario = (int) $_GET['fila'];
        $strColumnaUsuario = strtolower(trim($_GET['columna']));

        $strColumnas = ['', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];

        //Guardo el indice de la columna
        $intIndiceColumna = 0;
        for($intCont=0;$intCont<=8;$intCont++) {
            if($strColumnas[$intCont] === $strColumnaUsuario) {
                $intIndiceColumna = $intCont;
            }
        }

        if($intFilaUsuario < 1 || $intFilaUsuario > 8 || $intIndiceColumna < 1 || $intIndiceColumna > 8) {
            echo "<p>Error. Tienes que introducir Fila: entre 1-8 y Columna entre 'a'-'h'</p>";
        } else {
            $intConstante1 = $intFilaUsuario - $intIndiceColumna;
            $intConstante2 = $intFilaUsuario + $intIndiceColumna;

            echo "<table border=1>";
            for($intFila=1;$intFila<=8;$intFila++) {
                echo "<tr>";
                for($intColumna=1;$intColumna<=8;$intColumna++) {
                    if($intFila == $intFilaUsuario && $intColumna == $intIndiceColumna) {
                        echo "<td><img src='alfil.png' alt='imagen-alfil' width=25px height=25px></td>";
                    } elseif ($intFila - $intColumna == $intConstante1 || $intFila + $intColumna == $intConstante2) {
                        echo "<td style='background-color:purple;width:25px;height:25px;'></td>";
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
    }

?>