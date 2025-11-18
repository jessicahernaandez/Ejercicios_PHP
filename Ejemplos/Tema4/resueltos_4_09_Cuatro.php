<html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.09 Tetris</title>
        <style>
            table {
                border-collapse: collapse;
                margin: 20px;
            }
            td {
                padding: 5px;
            }
            table, th, td {
                border: 1px solid blue;
            }
        </style>
    </head>

    <body>
    <h1 style="text-align:center;">Tetris</h1>
    <form action="resueltos_4_09_Cuatro.php" >
        <table>
            <?php
            define("DIMENSION",10);// tamaño de la pantalla

            //cargo los datos en un array y muestro la pantalla que me llega
            for ($intFila = 0; $intFila < DIMENSION; $intFila++) {//paso por las filas
                echo "\n<tr>";
                for ($intColumna = 0; $intColumna < DIMENSION; $intColumna++) {//paso por las columnas
                    $blnArray[$intFila][$intColumna] = $_GET['elemento'.$intFila.'_'.$intColumna]??false;//guardo lo que me llega o false si no llega nada
                    //Si esta activo guardo que se seleccione, sino no escribo nada
                    $intAux=$blnArray[$intFila][$intColumna]?'checked':'';
                    // Generamos un nombre único para cada checkbox
                    echo "<td><input type='checkbox' name=".('elemento'.$intFila.'_'.$intColumna) . " $intAux></td>";
                }
                echo "</tr>";
            }
print_r($blnArray);
            ?>
        </table>
        <input type="submit" value="Enviar">
    </form>
    <?php
        //genero una fila rellena
        $arrAux=[];
        for($intAux = 0; $intAux < DIMENSION; $intAux++)
            $arrAux[]='on';

        //voy de la última fila para arriba eliminando las filas rellenas
        $intCantEliminadas=0;
        for ($intFila = 0; $intFila < DIMENSION; $intFila++) {
            if($blnArray[$intFila] == $arrAux){
               unset($blnArray[$intFila]); //elimino la fila
                $intCantEliminadas++; // cuento que he eliminado una más
            }
        }

        //quito los huecos en blanco del array
        //busco la primera no definida
        $intMueve = DIMENSION-1;
        for (; $intMueve > 0 && isset($blnArray[$intMueve]); $intMueve--);
        for ($intFila = $intMueve-1; $intFila >=0; $intFila--) {
            for (; $intFila >= 0 && !isset($blnArray[$intFila]); $intFila--);
            for (; $intFila >= 0 && isset($blnArray[$intFila]); $intFila--){
                echo "cambia fila $intMueve por $intFila";
                $blnArray[$intMueve]=$blnArray[$intFila]; //cambio la fila
                $intMueve--; // cuento que he eliminado una más
            }
        }

        //genero una fila vacía para rellenar
        $arrAux=[];
        for($intAux = 0; $intAux < DIMENSION; $intAux++)
            $arrAux[]=false;
        for ($intFila = 0; $intFila < $intCantEliminadas; $intFila++)
            $blnArray[$intFila]=$arrAux;
echo "sale";
        //pinto la salida
        echo "<table>\n";
        for ($intFila = 0; $intFila < DIMENSION; $intFila++) {//paso por las filas
            echo "\n<tr>";
            for ($intColumna = 0; $intColumna < DIMENSION; $intColumna++) {//paso por las columnas
                //Si esta activo guardo que se seleccione, sino no escribo nada
                $intAux=$blnArray[$intFila][$intColumna]?'checked':'';
                // Generamos un nombre único para cada checkbox
                echo "<td><input type='checkbox' name=".('imprime'.$intFila.'_'.$intColumna) . " $intAux></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        /*/paso por todas las filas para quitar las rellenas
        for ($intFila = DIMENSION-1; $intFila > 0; $intFila--) {
            //$intAcumulador = 0;
            if(array_sum($pixel[$intFila])==DIMENSION) {
                $intFilaAux=$intFila; //marco la primera fila a eliminar
                for (; $intFila >= 0; $intFila--) {// paso por las filas superiores a ver si puedo mover alguna
                    for (; $intFila > 0 && (array_sum($pixel[$intFila]) == DIMENSION ||
                        array_sum($pixel[$intFila]) == 0); $intFila--) ;// paso por las filas hasta localizar una no vacía ni llena
                    if($intFila >= 0) { // si he localizado una fila no vacía
                        $pixel[$intFilaAux--] = $pixel[$intFila]; // meto la fila y cambio de fila a añadir
                    }
                }
                for (; $intFilaAux >= 0; $intFilaAux--) // añado tantas filas como no haya rellenado
                    for ($intCont = 0; $intCont < DIMENSION; $intCont++) // relleno las columnas
                        $pixel[$intFilaAux][$intCont] = false;
            }
        }

        //pinta la matriz
        echo "\ntamaño de la tabla ".sizeof($pixel)."<table>";
        for ($intFila = 0; $intFila < DIMENSION; $intFila++) {
            echo "\n<tr>";
            for ($intColumna = 0; $intColumna < DIMENSION; $intColumna++) {
                // Generamos un nombre único para cada checkbox";
                $intAux = $pixel[$intFila][$intColumna]??0;
                $intAux=$intAux?'checked':'';
                echo "<td><input type='checkbox' name='pixel[$intFila][$intColumna]' $intAux></td>";
            }
            echo "</tr>";
        }
        echo "\n</table>";*/
    ?>
    </body>
</html>
