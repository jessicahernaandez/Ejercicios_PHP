<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.07</title>
    </head>
    <body>
        <form action="resueltos_4_07_Dos.php" method="get">
            
            
                
            <p><input type="submit" value="enviar"></p>
            <?php
                $strArrPalabras = ['yo'=>'I', 'tu'=>'you', 'el'=>'he', 'si'=>'yes', 'nombre'=>'name', 'día'=>'day',
                                    'semana'=>'week', 'mes'=>'moth', 'año'=>'year', 'pais'=>'country', 'libro'=>'book',
                                    'bolsa'=>'bag', 'archivo'=>'file', 'llave'=>'key', 'foto'=>'picture', 'agua'=>'water',
                                    'casa'=>'home', 'habitación'=>'bethroom', 'trabajo'=>'job', 'juego'=>'game'];
                $intArrAleatorios=[]; // puedo cargar los valores directamente con array_rand($strArrPalabras,5)
                while(count($intArrAleatorios)<5){//saca 5 valores no repetidos
                    $intAux = rand(0,19);
                    if(!in_array($intAux,$intArrAleatorios))
                        $intArrAleatorios[]=$intAux;
                }
print_r($intArrAleatorios);
                $intCount = 0;//de las posiciones del array asociativo
                $intCount2 = 0;//de los campos de texto
                // Para evitar recorrer todo el array, podría haber creado un array de arrays con las palabras [['yo','I'],['tu','you']...]
                foreach($strArrPalabras as $strEspaniol=>$strIngles){
                    if(in_array($intCount, $intArrAleatorios)){//si la palabra en la que estamos ha salido seleccionada
                        echo "<p><input type='text' name='espaniol$intCount2' value='$strEspaniol' readonly>\n";
                        echo "&nbsp;<input type='text' name='ingles$intCount2'></p>\n";
                        $intCount2++;
                    }
                    $intCount++;
                }


            $strArrPalabras = [['yo','I'], ['tu','you'], ['el','he'], ['si','yes'], ['nombre','name'], ['día','day'],
                ['seman','week'], ['mes','moth'], ['año','year'], ['pais','country'], ['libro','book'],
                ['bolsa','bag'], ['archivo','file'], ['llave','key'], ['foto','picture'], ['agua','water'],
                ['casa','home'], ['habitación','bethroom'], ['trabajo','job'], ['juego','game']];

            echo '<br /><br />';
            // Esta forma es mucho más sencilla y eficiente
            for($intCount=0; $intCount<5; $intCount++){
                echo "<p><input type='text' name='espanol$intCount' value='".$strArrPalabras[$intArrAleatorios[$intCount]][0]."' readonly>";
                echo "&nbsp;<input type='text' name='inges$intCount'></p>";
            }
            ?>
        </form>
    </body>
</html>