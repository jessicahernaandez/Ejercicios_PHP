<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.06</title>
    </head>
    <body>
        <form action="resueltos_4_06.php" method="get">
            
            <p><label for='palabra'>Palabra en español: </label>
            <input type='text' name='palabra'></p>
                
            <p><input type="submit" value="enviar"></p>
            <?php
                $strArrPalabras = ['yo'=>'I', 'tu'=>'you', 'el'=>'he', 'si'=>'yes', 'nombre'=>'name', 'día'=>'day', 
                                    'seman'=>'week', 'mes'=>'moth', 'año'=>'year', 'pais'=>'country', 'libro'=>'book', 
                                    'bolsa'=>'bag', 'archivo'=>'file', 'llave'=>'key', 'foto'=>'picture', 'agua'=>'water', 
                                    'casa'=>'home', 'habitación'=>'bethroom', 'trabajo'=>'job', 'juego'=>'game'];
                $strEspaniol = isset($_GET["palabra"])?strtolower($_GET["palabra"]):' ';
                /*if(isset($strArrPalabras[$strEspaniol]))
                    echo $strArrPalabras[$strEspaniol];*/
                echo $strArrPalabras[$strEspaniol]??'';
                // me ha mandado la palabra y está dentro del array
                //echo isset($_GET["palabra"]) && isset($strArrPalabras[strtolower($_GET["palabra"])])?$strArrPalabras[strtolower($_GET["palabra"])]:'';
            ?>
        </form>
    </body>
</html>