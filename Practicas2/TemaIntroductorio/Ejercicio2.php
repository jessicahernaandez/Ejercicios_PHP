<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="nombre">Nombre:</label>
        <br><input type="text" name="nombre"></br>

        <input type="submit" name="enviar">
    </form>

    <?php 
        if(isset($_GET['nombre'])) {
            $nombre = $_GET['nombre'];

            echo "Nombre en plural: (" . $nombre . "s)" ;
        }
    ?>
</body>
</html>