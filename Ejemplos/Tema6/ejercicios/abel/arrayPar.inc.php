<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arrayPar</title>
</head>

<body>
    <?php
    function esPar(int $intNum): bool
    {
        return $intNum % 2 === 0;
    }

    function arrayAleatorio(int $intTam, int $intMin, int $intMax): array
    {
        $array = [];
        for ($i = 0; $i < $intTam; $i++) {
            $array[$i] = rand($intMin, $intMax);
            }
        return $array;
    }

    

    echo esPar(5) ? "Es par" : "No es par";
    echo "<br>";
    $miArray = arrayAleatorio(20, 1, 100);
    print_r($miArray);
    ?>
</body>

</html>