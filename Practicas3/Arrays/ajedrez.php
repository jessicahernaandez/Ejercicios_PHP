<?php 
    $filaUsuario = $_GET["filaUsuario"] ?? '';
    $columnaUsuario = $_GET["columnaUsuario"] ?? '';
 
?>
<style>
        th {
            border: none;
        } 

        td {
            width: 30px;
            height: 30px;
        }
</style>

<h3></h3>
<form>
    <label for="filaUsuario">Introduce la fila: </label>
    <input type="number" name="filaUsuario" min="1" max="8" value=<?=$filaUsuario?>><br />

    <label for="columnaUsuario">Introduce la columna: </label>
    <input type="text" name="columnaUsuario" value=<?=$columnaUsuario?>><br />

    <input type="submit" name="enviar">
</form>

<?php 

    $titulo = "Ajedrez";
    include("cabecera.inc.php");

    if(isset($_GET["filaUsuario"]) && isset($_GET["columnaUsuario"])) {
        $filaUsuario = $_GET["filaUsuario"];
        $columnaUsuario = strtolower($_GET["columnaUsuario"]);

        $arrColumna = ['', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
        $indiceColumna = 0;

        //Consigo el indice de la columna
        for($intCont=0;$intCont<count($arrColumna);$intCont++) {
            if($arrColumna[$intCont] == $columnaUsuario) { 
                $indiceColumna = $intCont;
            }
        }

        if($filaUsuario <=8 && $filaUsuario > 0 && $indiceColumna <=8 && $indiceColumna > 0) {
            
            $constante1 = $filaUsuario - $indiceColumna;
            $constante2 = $filaUsuario + $indiceColumna;

            echo "<table border=1>";
            echo "<tr><th></th><th>a</th><th>b</th><th>c</th><th>d</th><th>e</th><th>f</th><th>g</th><th>h</th></tr>";
            for($intFila=1;$intFila<=8;$intFila++) {
                echo "<tr>";
                echo "<th>$intFila</th>";
                for($intColumna=1;$intColumna<=8;$intColumna++) {
                    
                    if($intFila == $filaUsuario && $intColumna == $indiceColumna) {
                        echo "<td><img src='alfil.png' alt='imagen' width=30px height=30px></td>";
                    } else if ($intFila + $intColumna == $constante2 || $intFila - $intColumna == $constante1) {
                        echo "<td style='background-color:red;'></td>";
                    } else {
                        $color = ($intFila + $intColumna) % 2 == 0 ? "black" : "white";
                        echo "<td style='background-color:$color;'></td>";
                    }
                }
                echo "</tr>";
            }
            echo "</table>";


        } else {
            echo "Los rangos de la columna o fila estan fuera.";
        }

    }


    include("pie.inc.php");


?>