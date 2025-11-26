<?php 

    if(isset($_GET["sensores"])) {
        $sensores = $_GET["sensores"];
    } else {
        $sensores = [];
    }

    $titulo = "Sensores";
    include("cabecera.inc.php");

    $areaMasAmenazada = 0;
    $sumaAmenazas = 0;
    $distanciaBat = 0;
    $protocolo = '';
    $tablero = [];

    echo "<table border=1>";
    echo "<tr><th></th><th>0</th><th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th><th>8</th><th>9</th><th>10</th><th>11</th><th>12</th><th>13</th><th>14</th><th>15</th><th>16</th><th>17</th><th>18</th><th>19</th></tr>";
    for($intFila=0;$intFila<=19;$intFila++) {
        echo "<tr>";
        echo "<th>$intFila</th>";
        for($intColumna=0;$intColumna<=19;$intColumna++) {
            echo "<td>";
            $valor = rand(0,10);
            $tablero[$intFila][$intColumna] = $valor;
            echo $valor;
            echo "</td>";
        }
        echo "<tr>";
    }
    echo "</table>";

    $posiciones = [];
    // Recorro la tabla para ir recorriendo posiciones
    for($intFila=0;$intFila<20;$intFila++) {
        for($intColumna=0;$intColumna<20;$intColumna++) {
            // Coordenadas
            $x = $intFila;
            $y= $intColumna;
            /*echo "$x,$y<br/>";
            echo "$x," . $y + 1 . "<br/>";
            echo "$x," . $y + 2 . "<br/>";*/

            if($x < 20 && $y < 20) {
                $posiciones = [
                    [$tablero[$x][$y], $tablero[$x][$y+1], $tablero[$x][$y+2]],
                    [$tablero[$x+1][$y], $tablero[$x+1][$y+1], $tablero[$x+2][$y+2]],
                    [$tablero[$x+2][$y], $tablero[$x+2][$y+1], $tablero[$x+ 2][$y+ 2]],
                ];
            }
            
            //$posiciones[] = [$x][$y];
            echo "<pre>";
            //print_r($posiciones);
            echo "<pre/>";
        }
    }


    echo "<pre>";
    print_r($tablero);
    echo "</pre>";


    include("pie.inc.php");


?>