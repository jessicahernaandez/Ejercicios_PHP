<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="numero">Introduce un número:</label>
        <br><input type="text" name="numero"></br>

        <input type="submit" name="enviar">
    </form>

    <?php 
        if(isset($_GET['numero'])) {
            $numUsuario = $_GET['numero'];

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
        }
    ?>
</body>
</html>