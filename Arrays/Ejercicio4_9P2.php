<?php 

    if(isset($_GET['enviar'])) {

        $casillasMarcadas = 0;

        //Saber cuales filas estan marcadas
        for($intFila=1;$intFila<=10;$intFila++) {
            for($intColumna=1;$intColumna<=10;$intColumna++) {
                if(isset($_GET['marcado'][$intFila][$intColumna])) {
                    $casillasMarcadas++;
                }
            }

            if($casillasMarcadas!=10) {
                echo "<table border=1>";
                for($intFila=1;$intFila<=10;$intFila++) {
                    echo "<tr>";
                    for($intColumna=1;$intColumna<=10;$intColumna++) {
                        if(isset($_GET['marcado'][$intFila][$intColumna])) {
                            echo "<td><input type='checkbox' name='marcado[$intFila][$intColumna]' checked></td>";
                        } else {
                            echo "<td><input type='checkbox' name='marcado[$intFila][$intColumna]'></td>";
                        }
                    }
                }
            } else {
                $casillasMarcadas = 0;
            }
        }
    }

?>