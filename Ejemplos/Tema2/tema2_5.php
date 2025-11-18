<html>
    <head></head>
    <body>
        <?php
            $strNombre = 'Pepe';
            $strApellido1 = 'Perez';
            $strFullName = $strNombre . ' ' . $strApellido1;
            $intEdad = 15;
            $intYear = 2024 - $intEdad;

            echo "El nombre completo es $strFullName<br />";
            echo "Su año de nacimiento es $intYear<br />";
            if($intEdad<18)
                echo "Eres menor de edad, no podemos darte de alta hasta el año ". (18-$intEdad+2025);
        ?>
    </body>
</html>
