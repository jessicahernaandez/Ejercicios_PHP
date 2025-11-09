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

        <label for="apellido">Apellido:</label>
        <br><input type="text" name="apellido"></br>

        <label for="edad">Edad:</label>
        <br><input type="text" name="edad"></br>

        <input type="submit" name="enviar">
    </form>

    <?php 
    
        if (isset($_GET['nombre']) && isset($_GET['apellido']) && isset($_GET['edad'])) {
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $edad = $_GET['edad'];

            $fullName = $nombre . " " . $apellido;
            $year = 2025 - $edad;

            echo "Nombre completo: $fullName<br>";
            echo "Año de nacimiento: $year<br>";

            if($edad < 18) {
                $añoAlta = $year + 18;
                echo "Eres menor de edad, no podemos darte de alta hasta $añoAlta";
            }
        }
    ?>
</body>
</html>