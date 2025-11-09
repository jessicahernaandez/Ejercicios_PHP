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

            for($intFila=1;$intFila<=$tamanio;$intFila++) {

                //Bucle para los espacios
                for($intEspacios=1;$intEspacios<=$tamanio-$intFila;$intEspacios++) {
                    echo "&nbsp;&nbsp;";
                }

                //Bucle para las estrellas
                for($intEstrellas=1;$intEstrellas<=($intFila*2-1);$intEstrellas++) {
                    echo "*";
                }

                echo "<br/>";
            }

            //Parte inferior del rombo
            for($intFila=$tamanio-1;$intFila>0;$intFila--) {

                //Bucle para los espacios
                for($intEspacios=$tamanio-$intFila;$intEspacios>0;$intEspacios--) {
                    echo "&nbsp;&nbsp;";
                }

                //Bucle para las estrellas
                for($intEstrellas=($intFila*2-1);$intEstrellas>0;$intEstrellas--) {
                    echo "*";
                }

                echo "<br/>";
            }
        }
    ?>
</body>
</html>