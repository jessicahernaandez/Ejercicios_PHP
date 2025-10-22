<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tetris</title>
</head>
<body>
    <form method="get" action="Tetris.php">
        <table>
                <?php

                    //Hago un bucle donde verifico la cantidad de columnas que hay marcadas por filas.
                    $filasIguales = 0;
                    $filasLLenas = [];
                    for($intFila=1;$intFila<=10;$intFila++) {
                        $columnasMarcadas = 0;
                        for($intColumna=1;$intColumna<=10;$intColumna++) {
                            if(isset($_GET['marcadas'][$intFila][$intColumna])) {
                                $columnasMarcadas++;
                            }
                        }

                        //Una vez saliendo del bucle de las columnas, si la fila no tiene marcadas
                        //todas las columnas, entonces la fila estara igual, si no, guardamos esa fila en el array.
                        if ($columnasMarcadas != 10) {
                            $filasIguales++;
                        } else {
                            $filasLLenas[] = $intFila;
                        }
                    }

                    //Calculo las filas vacias que generare al principio
                    $filasVacias = 10 - $filasIguales;

                    //Creo otro bucle para generar las filas vacias
                    $filaActual = 1;
                    for($intFilaVacia = 1;$intFilaVacia <= $filasVacias; $intFilaVacia++) {
                        echo "<tr>";
                        for($intColumna = 1; $intColumna<=10;$intColumna++) {
                            echo "<td>";
                            echo "<input type='checkbox' name='marcadas[$filaActual][$intColumna]'>";
                            echo "</td>";
                        }
                        echo "</tr>"; 
                        $filaActual++;
                    }

                    //Ahora genero las filas que estan iguales, con los checkboxs marcados.
                    for($filaTabla=1;$filaTabla<=10;$filaTabla++) {
                        if(!in_array($filaTabla, $filasLLenas)) {
                            echo "<tr>";
                            for($intColumna=1;$intColumna<=10;$intColumna++) {
                                if(isset($_GET['marcadas'][$filaTabla][$intColumna])) {
                                    echo "<td>";
                                    echo "<input type='checkbox' name='marcadas[$filaActual][$intColumna]' checked>";
                                    echo "</td>";
                                } else {
                                    echo "<td>";
                                    echo "<input type='checkbox' name='marcadas[$filaActual][$intColumna]'>";
                                    echo "</td>";
                                }                               
                                
                            }
                            echo "</tr>";
                            $filaActual++;
                        }
                    }
                ?>
        </table>
        <input type='submit' name='enviar'>
    </form>
    
</body>
</html>