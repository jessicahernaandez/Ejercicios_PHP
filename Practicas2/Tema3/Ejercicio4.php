<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $seleccionadoNumero = $_GET['numero'] ?? 0;
        $seleccionadoTamanio = $_GET['cuantos'] ?? 0;
    ?>
    <form action="" method="get">
        <label for="cuantos">¿Cuantos triangulos?:</label>
        <br><input type="text" name="cuantos" value="<?=$seleccionadoTamanio?>"></br>

        <label for="numero">Introduce su tamaño:</label>
        <br><input type="text" name="numero" value="<?=$seleccionadoNumero?>"></br>

        <input type="submit" name="enviar">
    </form>

    <?php 
        if(isset($_GET['numero']) && isset($_GET['cuantos'])) {
            $numUsuario = $_GET['numero'];
            $tamanio = $_GET['cuantos'];

            while($tamanio != 0) {
                echo "<br />";
                for($intCont=1;$intCont<=$numUsuario;$intCont++) {
                    for($intEstrellas=1;$intEstrellas<=$intCont;$intEstrellas++) {
                        echo " * ";
                    }
                    echo "<br>";
                }

                for($intCont=$numUsuario-1;$intCont>0;$intCont--) {
                    for($intEstrellas=$intCont;$intEstrellas>0;$intEstrellas--) {
                        echo " * ";
                    }
                    echo "<br>";
                }
                $tamanio--;
            }
                
        }
    ?>
</body>
</html>