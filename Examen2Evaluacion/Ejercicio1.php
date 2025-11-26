<?php 

    include("cabecera.inc.php");

    //Pregunto si me han mandado algo, si no inicializo
    if(isset($_GET["x1"]) && isset($_GET["y1"]) && isset($_GET["x2"]) && isset($_GET["y2"]) && isset($_GET["x3"]) && isset($_GET["y3"])) {
        $x1 = $_GET["x1"];
        $y1 = $_GET["y1"];
        $x2 = $_GET["x2"];
        $y2 = $_GET["y2"];
        $x3 = $_GET["x3"];
        $y3 = $_GET["y3"];

    } else if (isset($_GET["gameOver"])) { //Tengo que verificar mas adelante

    } else {
        $arriba = $_GET["arriba"] ?? null;
        $abajo = $_GET["abajo"] ?? null;
        $derecha = $_GET["derecha"] ?? null;
        $izquierda = $_GET["izquierda"] ?? null;

        $x1 = 5;
        $y1 = 4;
        $x2 = 5;
        $y2 = 5;
        $x3 = 5;
        $y3 = 6;

        //Puedo guardarlos en array temporal
        $arrayX =[$x1,$x2,$x3];
        $arrayY =[$y1,$y2,$y3];

        //Pruebo a pintar el tablero
        echo "<table border='1'>";
        for($intFila=1;$intFila<=8;$intFila++) {
            echo "<tr>";
            for($intColumna=1;$intColumna<=8;$intColumna++) {
                $checked = in_array($intFila,$arrayY) && in_array($intColumna,$arrayX) ? "checked" : "";
                echo "<td>";
                echo "<input type='checkbox' name='tablero[$intFila][$intColumna]' $checked>";
                echo "</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

        echo "<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='arriba' value='arriba⇧'><br/><br/>";
        echo "<input type='submit' name='izquierda' value='izquierda⇦'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<input type='submit' name='derecha' value='derecha⇨'><br/><br/>";
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='abajo' value='abajo⇩'><br/>";
    }

    include("pie.inc.php");

?>