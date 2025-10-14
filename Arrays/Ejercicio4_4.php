<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Escribe un programa que genere 20 números enteros aleatorios entre 0 y
    100 y que los almacene en un array. El programa debe ser capaz de pasar todos
    los números pares a las primeras posiciones del array (del 0 en adelante) y
    todos los números impares a las celdas restantes.-->

    <?php 

        $intNumAleatorios = [];
        for($intCont=0;$intCont<20;$intCont++) {
            $intNumAleatorios[$intCont] = rand(0,100);
        }

        echo "Array con 20 numeros aleatorios:<br /> ";
        print_r($intNumAleatorios);

        $intPares = [];
        $intImpares = [];

        for($intCont=0;$intCont<count($intNumAleatorios);$intCont++) {
            if($intNumAleatorios[$intCont] % 2 === 0) {
                $intPares[] = $intNumAleatorios[$intCont];
            } else {
                $intImpares[] = $intNumAleatorios[$intCont];
            }
        }

        /*echo "<br /> <br /> Array con los primeros numeros pares y el resto impares: <br /> ";
        $intArrCompleto = array_merge($intPares, $intImpares);
        print_r($intArrCompleto);*/

        echo "<br /> <br /> Ordenado de menor a mayor: <br />";

    //Para $intPares
    $longitudPares = count($intPares);  // Fija la longitud (no cambia)
    if ($longitudPares > 1) {  // Solo si hay al menos 2 elementos
        for ($intCont = 0; $intCont < $longitudPares - 1; $intCont++) {
            // No necesitas isset si el array es denso (claves 0 a n-1)
            if ($intPares[$intCont] > $intPares[$intCont + 1]) {
                $intAux = $intPares[$intCont + 1];
                $intPares[$intCont + 1] = $intPares[$intCont];
                $intPares[$intCont] = $intAux;
            }
        }
    }

    //Para $intImpares (igual)
    $longitudImpares = count($intImpares);
    if ($longitudImpares > 1) {
        for ($intCont = 0; $intCont < $longitudImpares - 1; $intCont++) {
            if ($intImpares[$intCont] > $intImpares[$intCont + 1]) {
                $intAux = $intImpares[$intCont + 1];
                $intImpares[$intCont + 1] = $intImpares[$intCont];
                $intImpares[$intCont] = $intAux;
            }
        }
    }

        $intArrayOrdenado = array_merge($intPares, $intImpares);
        print_r($intArrayOrdenado);
    ?>
</body>
</html>