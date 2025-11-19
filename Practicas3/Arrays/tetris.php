
<form action="" method="get">

    <table border="1">
        <?php

            for($intFila=1;$intFila<=10;$intFila++) {
                echo "<tr>";
                for($intColumna=1;$intColumna<=10;$intColumna++) {
                    $checked = isset($_GET['marcados'][$intFila][$intColumna]) ? 'checked' : '';
                    echo "<td><input type='checkbox' name='marcados[$intFila][$intColumna]' $checked></td>";
                }
                echo "</tr>";
            }
        
        ?>
    </table>
    <br />
    <input type="submit" name="enviar">

</form>

<?php 

    $titulo = "Tetris";
    include("cabecera.inc.php");


    $filasLlenas = [];

    for($intFila=1;$intFila<=10;$intFila++) {
        if(isset($_GET["marcados"][$intFila]) && count($_GET["marcados"][$intFila]) == 10) {
            $filasLlenas[] = $intFila;
        } 
    }

    $filasVacias = count($filasLlenas);

    //Me genero las filas vacias
    $filaActual = 1;
    echo "<table border=1>";
    for($intCont=1;$intCont<=$filasVacias;$intCont++) {
        echo "<tr>";
        for($intColumna=1;$intColumna<=10;$intColumna++) { 
            echo "<td>";
            echo "<input type='checkbox' name='marcadas[$filaActual][$intColumna]'>";
            echo "</td>";
        }
        echo "</tr>"; 
        $filaActual++;
    }

    //Ahora genero las filas que estan iguales, con los checkboxs marcados.
    for($filaTabla=1;$filaTabla<=10;$filaTabla++) {
        if(!in_array($filaTabla, $filasLlenas)) {
            echo "<tr>";
            for($intColumna=1;$intColumna<=10;$intColumna++) {
                if(isset($_GET['marcados'][$filaTabla][$intColumna])) {
                    echo "<td>";
                    echo "<input type='checkbox' name='marcados[$filaActual][$intColumna]' checked>";
                    echo "</td>";
                } else {
                    echo "<td>";
                    echo "<input type='checkbox' name='marcados[$filaActual][$intColumna]'>";
                    echo "</td>";
                }                                                    
            }
            echo "</tr>";
            $filaActual++;
        }
    }

    include("pie.inc.php");

?>