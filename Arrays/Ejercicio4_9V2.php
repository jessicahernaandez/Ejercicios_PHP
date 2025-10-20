<?php 
    if(isset($_GET['enviar'])) {
        $filasIguales = 0;
        $filasMarcadas = [];
        $casillasMarcadas = 0;
        $noLlenas = [];  

        for($intFila=1;$intFila<=10;$intFila++) {
            $casillasMarcadas = 0;
            for($intColumna=1;$intColumna<=10;$intColumna++) {
                if(isset($_GET['marcado'][$intFila][$intColumna])) {
                    $casillasMarcadas++;
                }   
            }

            if($casillasMarcadas !=10) {
                $filasIguales++;
                for($intColumna=1;$intColumna<=10;$intColumna++) {
                    if(isset($_GET['marcado'][$intFila][$intColumna])) {
                        $filasMarcadas[$intFila][$intColumna] = true;
                    }
                }
                $noLlenas[] = $intFila; 
            }
        }

        $filasVacias = 10 - $filasIguales;
    
        echo "<table border=1>";
        $filaActual=1;
        for($intCont=0;$intCont<$filasVacias;$intCont++) {
            echo "<tr>";
            for($intColumna=1;$intColumna<=10;$intColumna++) {
                echo "<td><input type='checkbox' name='marcado[$filaActual][$intColumna]' /></td>";
            }
            echo "</tr>";
            $filaActual++;
        }

        //Genero las filas con checkboks.
        for($i=0;$i<count($noLlenas);$i++) {  
            $intFila = $noLlenas[$i];  
            echo "<tr>";
            for($intColumna=1;$intColumna<=10;$intColumna++) {
                if(isset($filasMarcadas[$intFila][$intColumna])){
                    echo "<td><input type='checkbox' name='marcado[$filaActual][$intColumna]' checked /></td>";  
                } else {
                    echo "<td><input type='checkbox' name='marcado[$filaActual][$intColumna]' /></td>";  
                }
            }
            echo "</tr>";  
            $filaActual++;
        }
        echo "</table>";
    }
?>
