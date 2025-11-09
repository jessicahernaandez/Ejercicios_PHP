<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="precio">Precio:</label>
        <br><input type="text" name="precio"></br>

        <input type="submit" name="enviar">
    </form>

    <?php 
    
        if (isset($_GET['precio'])) {
            $precio = $_GET['precio'];

            $IVAaIncluir = $precio * 0.21;
            $precioTotal = $IVAaIncluir + $precio;

            echo "<p>El precio con IVA es de" . $precioTotal . "€</p>";
        }
    ?>
</body>
</html>