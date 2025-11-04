<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
        <?php 
            echo "<table>";
            for($intFila=0;$intFila<10;$intFila++) {
                echo "<tr>";
                for($intColumna=0;$intColumna<10;$intColumna++) {
                    $checked = isset($_GET['tablero'][$intFila][$intColumna]) ? "checked" : "";
                    echo "<td><input type='checkbox' name='tablero[$intFila][$intColumna]' $checked></td>";
                    $tableroAux[$intFila][$intColumna] = isset($_GET['tablero'][$intFila][$intColumna]) ? 1 : 0;  
                }
                echo "</tr>";
            }
            echo "</table>";
        ?>
        <br>
        <input type="submit" name="enviar">
    </form>

    <?php 

        $punteroLleno = -1;
        echo "Inicialmente -> La ultima fila llena es: $punteroLleno";

        $arrFilaLlena = [1,1,1,1,1,1,1,1,1,1];
 
        // Primer bucle, para encontrar la ultima fila llena
        for($intFila=9;$intFila>=0;$intFila--) {
            if($tableroAux[$intFila] == $arrFilaLlena && $punteroLleno == -1) {
                $punteroLleno = $intFila;
            } 

        }

        echo "<br>Despues de buscar en el array -> La ultima fila llena es: $punteroLleno";

        // Segundo bucle, a partir de $punteroLleno voy preguntando, si hay una fila vacia
        // de ser cierto, se intercambia con la fila que esta apuntando $punteroLleno, $puntero disminuye y asi sucesivamente. 
        for($intFila=$punteroLleno-1; $intFila>=0; $intFila--) {
            if($tableroAux[$intFila] != $arrFilaLlena) {
                $tableroAux[$punteroLleno] = $tableroAux[$intFila];
                $punteroLleno--;
            }
        }

        echo "<br>La ultima fila llena para borrar es: $punteroLleno";
        // $punteroLLeno me indica desde que fila tengo que dejar todo a 0.
        for($intFila=$punteroLleno;$intFila>=0;$intFila--) {
            $tableroAux[$intFila] = array_fill(0,10,0);
        }

        // Mostramos.
        echo "<table>";
            for($intFila=0;$intFila<10;$intFila++) {
                echo "<tr>";
                for($intColumna=0;$intColumna<10;$intColumna++) {  
                    $checked = $tableroAux[$intFila][$intColumna] == 1 ? "checked" : "" ;
                    echo "<td><input type='checkbox' name='tablero[$intFila][$intColumna]' $checked></td>";  
                }
                echo "</tr>";
            }
        echo "</table>";

        echo "<br><br>Tablero modificado:";
        echo "<pre>";
        print_r($tableroAux);
        echo "</pre>";
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";
        echo "<br>";
        echo "<pre>";
        print_r($tableroAux);
        echo "</pre>";
    ?>
</body>
</html>