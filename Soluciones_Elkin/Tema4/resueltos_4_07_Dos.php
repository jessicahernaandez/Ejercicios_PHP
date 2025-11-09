<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.07</title>
    </head>
    <body>
        <form action="resueltos_4_07_Dos.php" method="get">
            
            
                
            <?php
                $strArrPalabras = ['yo'=>'I', 'tu'=>'you', 'el'=>'he', 'si'=>'yes', 'nombre'=>'name', 'día'=>'day', 
                                    'seman'=>'week', 'mes'=>'moth', 'año'=>'year', 'pais'=>'country', 'libro'=>'book', 
                                    'bolsa'=>'bag', 'archivo'=>'file', 'llave'=>'key', 'foto'=>'picture', 'agua'=>'water', 
                                    'casa'=>'home', 'habitación'=>'bethroom', 'trabajo'=>'job', 'juego'=>'game'];

                $intAcertadas=0;
                for($intCount = 0;$intCount<5; $intCount++){
                    $strIngles = isset($_GET["ingles".$intCount])?$_GET["ingles".$intCount]:'';
                    $strEspaniol = isset($_GET["espaniol".$intCount])?$_GET["espaniol".$intCount]:'';
					echo "<span style='color: ";
					if($strIngles == $strArrPalabras[$strEspaniol]) {
                        echo 'green';
                        $intAcertadas++;
                    }else
						echo 'red';
					echo ";'> $strEspaniol : $strIngles </span><br>";
                }

            echo "<br /><span style='color:'black';'>Acertadas: $intAcertadas <br />Incorrectas: " . (5-$intAcertadas) . "</span>";
            ?>
        </form>
    </body>
</html>