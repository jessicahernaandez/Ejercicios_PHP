<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action ='Ejercicio3_4.php' method='get'>
        <label for="numUsuario">Introduce un numero: </label>
        <input type="text" name="numUsuario" id="numUsuario">
        <input type="submit" value="enviar">
    </form>
</body>
</html>

<?php 
  if(isset($_GET["numUsuario"])) {
    $numTriangulos = $_GET["numUsuario"]?:0;

    if($numTriangulos!=0) {

        for($intTriangulos=1;$intTriangulos<=$numTriangulos;$intTriangulos++) {
            $intTamanio=4;
            for($intFilas=1;$intFilas<=$intTamanio;$intFilas++) {
                echo str_repeat("* ", $intFilas) . "<br />";
            }

            for($intFilas=$intTamanio-1;$intFilas>=1;$intFilas--) {
            echo str_repeat("* ", $intFilas) . "<br />";
            }

            echo "<br />";
        }
        
        
    } else {
        echo "Introduce un número distinto y mayor a 0.";
    }

  }
?>


