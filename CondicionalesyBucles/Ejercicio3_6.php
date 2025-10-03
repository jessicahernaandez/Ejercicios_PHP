<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Ejercicio3_6.php" method="get">
        <label for="tamanio">Tamanio: </label>
        <input type="text" name="tamanio" id="tamanio">
        <input type="submit" value="enviar">
    </form>   

    <?php 
    /*Usando el triangulo anterior, dibuja en la parte superior de la pantalla un conjunto de triangulos para 
    llenar toda la pantalla*/

    if(isset($_GET["tamanio"])) {
        $intTamanio=$_GET["tamanio"]??0;

        if($intTamanio > 0) {
            for($intFila=1;$intFila <=$intTamanio;$intFila++) {
                $intEstrellas= 2 * $intFila -1;
                $intEspacios= $intTamanio - $intFila;

                    echo str_repeat("-", $intEspacios * 3) . 
                    str_repeat("&nbsp;*&nbsp;", $intEstrellas) . str_repeat("-", $intEspacios * 3) . "<br/>";
                                     
            }            
        }
    }

    ?>
    
</body>
</html>






