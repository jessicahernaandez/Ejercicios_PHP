<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        /*Escribe un programa que genere 20 números enteros aleatorios entre 0 y
        100 y que los almacene en un array. El programa debe ser capaz de pasar todos
        los números pares a las primeras posiciones del array (del 0 en adelante) y
        todos los números impares a las celdas restantes.*/

        $intNumAleatorios = [];

        for($intCont=0; $intCont < 20; $intCont++) {
            $intNumAleatorios[$intCont] = rand(0,100);
        }

        echo "Array con numeros aleatorios: <br/>";
        print_r($intNumAleatorios);

        $intNumPares=[];
        $intNumImpares=[];

        //Primera forma -> Separamos los numeros pares e impares.
        for($intCont=0;$intCont<count($intNumAleatorios);$intCont++) {
            if($intNumAleatorios[$intCont] % 2 === 0) {
                $intNumPares[$intCont] = $intNumAleatorios[$intCont];
            } else {
                $intNumImpares[$intCont] = $intNumAleatorios[$intCont];
            }
        }

        echo "<br/><br/>Array combinado:<br/>";
        $intNumCombinados = array_merge($intNumPares, $intNumImpares);
        print_r($intNumCombinados);


        //Segunda forma
        $intNumOrdenados = $intNumAleatorios;
        
        for($intCont=0, $intPrincipio=0;$intCont<count($intNumOrdenados);$intCont++) {
            if($intNumOrdenados[$intCont] % 2 === 0) {
                $intAux = $intNumOrdenados[$intCont];
                $intNumOrdenados[$intCont] = $intNumOrdenados[$intPrincipio];
                $intNumOrdenados[$intPrincipio] = $intAux;
                $intPrincipio++;
            }
        }

        echo "<br/><br/>Array ordenado: <br/>";
        print_r($intNumOrdenados);

    ?>
</body>
</html>