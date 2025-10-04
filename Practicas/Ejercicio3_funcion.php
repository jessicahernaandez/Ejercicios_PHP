<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--FORMULARIO-->
    <form action="Ejercicio3_funcion.php" method="get">
        <label for="tamanio">Introduce una cantidad: </label>
        <input type="text" name="tamanio">

        <input type="submit" name="enviar">
    </form>

    <?php 
        if(isset($_GET["tamanio"])) {
            $intTamanio=$_GET["tamanio"]?:0;

            //Primer bucle, utilizando la funcion str_repeat.
            for($intFila=1;$intFila<=$intTamanio;$intFila++) {
                $intEstrellas=$intFila;
                echo str_repeat("* ", $intEstrellas) . "<br />";
            }

            //Segundo bucle, -> Parte inferior
            for($intFila=$intTamanio-1;$intFila>=1;$intFila--) {
                $intEstrellas = $intFila;
                echo str_repeat("* ", $intEstrellas) . "<br />";
            }
        }

    ?>
</body>
</html>