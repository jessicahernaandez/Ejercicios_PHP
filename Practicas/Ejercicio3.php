<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=-, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Formulario-->
    <form action="Ejercicio3.php" method="get">
        <label for="tamanio">Ingresa una cantidad: </label>
        <input type="text" name="tamanio">

        &nbsp;<input type="submit" name="enviar">
    </form>

    <?php 
        if(isset($_GET["tamanio"])) {
            $intTamanio=$_GET["tamanio"]?:0;

            //Primer Bucle -> Crea la primera parte del triangulo
            for($intFila=1; $intFila<= $intTamanio;$intFila++) {
                for($intEstrellas=1; $intEstrellas<=$intFila; $intEstrellas++) {
                    echo "* ";
                }

                echo "</br>";
            } 
            
            //Segundo Bucle -> Parte inferior del triangulo.
            for($intFila=$intTamanio-1;$intFila>=1;$intFila--) {
                for($intEstrellas=$intFila;$intEstrellas>=1;$intEstrellas--) {
                    echo "* ";
                }
                echo "</br>";
            }
        }          
    ?>

</body>
</html>