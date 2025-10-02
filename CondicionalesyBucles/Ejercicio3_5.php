<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Triangulo Impares</title>
</head>
<body>
    <form action="" method="get">
        <label for="tamanio">Tamanio: </label>
        <input type="number" name="tamanio" id="tamanio" min="1">
        <input type="submit" value="Dibujar">
    </form>

    <?php
    if (isset($_GET["tamanio"])) {
        $intTamanio = $_GET["tamanio"];

        if ($intTamanio > 0) {
            for ($intFila = 1; $intFila <= $intTamanio; $intFila++) {
                $estrellas = 2 * $intFila - 1;
                $espacios = $intTamanio - $intFila;

                echo str_repeat("&nbsp;", $espacios * 3) . //Lo multiplico por 3 para que los espacios ocupen mas lugar y pueda verse mas centrado.
                     str_repeat("*&nbsp;", $estrellas) . "<br />";
            }
        }
    }
    ?>
</body>
</html>