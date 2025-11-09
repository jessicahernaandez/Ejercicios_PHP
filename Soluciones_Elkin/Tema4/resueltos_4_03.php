<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.03</title>
    </head>
    <body>
        <form action="temperaturas.php" method="get">
            <?php
                $strArrMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                foreach($strArrMeses as $strMes){
                    echo "<p><label for='$strMes'>$strMes: </label>";
                    echo "<input type='text' name='$strMes'></p>";
                }
            ?>
            <p><input type="submit" value="enviar"></p>
        </form>
    </body>
</html>
