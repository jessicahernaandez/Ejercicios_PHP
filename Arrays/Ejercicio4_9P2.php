<?php 

    if(isset($_GET['enviar'])) {

        $casillasMarcadas = 0;
        $filas = 0;

        echo "<table border=1>";
        //Saber cuales filas estan marcadas
        for($intFila=1;$intFila<=10;$intFila++) {
            $casillasMarcadas = 0;
            for($intColumna=1;$intColumna<=10;$intColumna++) {
                if(isset($_GET['marcado'][$intFila][$intColumna])) {
                    $casillasMarcadas++;
                }
            }

            
            if($casillasMarcadas!=10) {  
                    echo "<tr>";
                    for($intColumna=1;$intColumna<=10;$intColumna++) {
                        if(isset($_GET['marcado'][$intFila][$intColumna])) {
                            echo "<td><input type='checkbox' name='marcado[$intFila][$intColumna]' checked></td>";
                        } else {
                            echo "<td><input type='checkbox' name='marcado[$intFila][$intColumna]'></td>";
                        }
                    }
                    echo "</tr>";
                    $filas++;
            }    
        }      
    }

    while($filas < 10) {
        echo "<tr>";
        for($intCont=1;$intCont<=10;$intCont++) {
            echo "<td><input type='checkbox' name='marcado[$filas][$intCont]'></td>";
        }
        echo "</tr>";
        $filas++;
    }

    echo "</table>";
    echo "<pre>";
    echo print_r($_GET);
    echo "<pre>";
    
?>