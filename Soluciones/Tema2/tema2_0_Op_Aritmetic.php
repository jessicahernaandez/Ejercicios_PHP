<html>
    <head></head>
    <body>
        <?php
            $intPrecio = 10;
            $strNombre = 'Pepe';
            $strNombre2 = 'María';
            $intSueldo = 2000;
            $intSueldo2 = 3000;

            echo "El precio con iva de $intPrecio es " . ($intPrecio*1.21) . "<br />". PHP_EOL;
            echo 'Nombre en plural ' . $strNombre . 's<br />';
            echo "Nombre en plural ${strNombre}s<br />\n";
            // falla pq no existe ese nombre de variable
            echo "Nombre en plural $strNombres<br />\n";
            // deja un espacio en blanco
            echo "Nombre en plural $strNombre s<br />\n";
            echo "\t$strNombre y $strNombre2 ganan juntos " . ($intSueldo+$intSueldo2) . "€";
            
            echo "<br /><br /><br /><br />";
            $a=5;$b=$c=null;$d='pepe';
            echo "1.- " . ($a??$d) . "<br />";
            echo "2.- " . ($b??$d) . "<br />";
            echo "3.- " . ($b??"5") . "<br />";
            echo "4.- " . ($b??$c) . "<br />";
            
        ?>
    </body>
</html>
