<html>
    <head></head>
    <body>
        <?php
            $strNombre = 'Pepe';
            $strApellido1 = 'Perez';
            $strFullName = $strNombre . ' ' . $strApellido1;
            $intEdad = 25;
            $intYear = 2025 - $intEdad;

            echo "El nombre completo es $strFullName<br />";
            echo "Su año de nacimiento es $intYear";
        ?>
    </body>
</html>
