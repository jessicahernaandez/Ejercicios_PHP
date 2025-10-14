<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        //Genera un programa que ordene un array según su número de índice.

        $intArrNum[3] = 23;
        $intArrNum[12] = 12;
        $intArrNum[0] = 16;
        $intArrNum[9] = 7;

        echo "Array inicial: <br/>";
        print_r($intArrNum);
        echo "<br/>";
        echo "<br/>";

        //Ordenarlos por sus indices.
        for($intCont=0, $intElemento=0; $intElemento<count($intArrNum); $intCont++) {
            if(isset($intArrNum[$intCont])) {
                $intElemento++;
                $intAux = $intArrNum[$intCont];
                unset($intArrNum[$intCont]);
                $intArrNum[$intCont] = $intAux;
            }
        }

        echo "Array ordenado por sus indices: <br/>";
        print_r($intArrNum);

    ?>
</body>
</html>