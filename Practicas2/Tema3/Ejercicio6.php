<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="tamanio">Introduce el tamaño:</label>
        <br><input type="text" name="tamanio"></br>

        <input type="submit" name="enviar">
    </form>

    <?php 
    
        if(isset($_GET['tamanio'])) {
            $tamanio = $_GET['tamanio'];
            $cantidadTriangulos = 20;

            
                for($intFila=1;$intFila<=$tamanio;$intFila++) {

                    while($cantidadTriangulos != 0) {
                        //Bucle para los espacios
                        for($intEspacios=1;$intEspacios<=$tamanio-$intFila;$intEspacios++) {
                            echo "&nbsp;&nbsp;";
                        }

                        //Bucle para las estrellas
                        for($intEstrellas=1;$intEstrellas<=($intFila*2-1);$intEstrellas++) {
                            echo "*";
                        }

                        //Bucle para los espacios
                        for($intEspacios=1;$intEspacios<=$tamanio-$intFila;$intEspacios++) {
                            echo "&nbsp;&nbsp;";
                        }

                        echo "&nbsp;";
                        $cantidadTriangulos--;
                    }
                    echo "<br/>";
                    $cantidadTriangulos = 20;
                }
            
        }
    ?>

</body>
</html>