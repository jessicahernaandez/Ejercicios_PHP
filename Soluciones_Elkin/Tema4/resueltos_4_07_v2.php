<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.07</title>
    </head>
    <body>
        <form action="resueltos_4_07_Dos_v2.php" method="get">
            
            
                
            <p><input type="submit" value="enviar"></p>
            <?php
                $strArrPalabras = ['yo'=>'I', 'tu'=>'you', 'el'=>'he', 'si'=>'yes', 'nombre'=>'name', 'día'=>'day',
                                    'semana'=>'week', 'mes'=>'moth', 'año'=>'year', 'pais'=>'country', 'libro'=>'book',
                                    'bolsa'=>'bag', 'archivo'=>'file', 'llave'=>'key', 'foto'=>'picture', 'agua'=>'water',
                                    'casa'=>'home', 'habitación'=>'bethroom', 'trabajo'=>'job', 'juego'=>'game'];
                $strArrAleatorios = [];
                // Para evitar recorrer todo el array, podría haber creado un array de arrays con las palabras [['yo','I'],['tu','you']...]
                while(sizeof($strArrAleatorios)<5){
                    foreach($strArrPalabras as $strEspaniol=>$strIngles){
                        $intAux=sizeof($strArrAleatorios);
                        if(rand(0,9)>7 && !in_array($strEspaniol,$strArrAleatorios)){ //tengo una probabilidad de un 30%
                            $strArrAleatorios[] = $strEspaniol;
                            echo "<p><input type='text' name='espaniol$intAux' value='$strEspaniol' readonly>";
                            echo "&nbsp;<input type='text' name='usuario$intAux'>";
                            echo "&nbsp;<input type='hidden' name='ingles$intAux' value='$strIngles' ></p>\n";
                        }
                        if(sizeof($strArrAleatorios)==5) break;
                    }
                }
            ?>
        </form>
    </body>
</html>