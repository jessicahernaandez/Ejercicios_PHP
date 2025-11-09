<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.07</title>
    </head>
    <body>
        <form action="resueltos_4_07_Dos.php" method="get">
                
            <?php

                $intAcertadas=0;
                for($intCount = 0;$intCount<5; $intCount++){
                    $strIngles = $_GET["ingles".$intCount]??'';
                    $strUsuario = $_GET["usuario".$intCount]??'*';
                    $strEspaniol = $_GET["espaniol".$intCount]??'';
					echo "<span style='color: ";
					if($strIngles == $strUsuario) {
                        echo 'green';
                        $intAcertadas++;
                    }else
						echo 'red';
					echo ";'> $strEspaniol : $strUsuario </span><br>";
                }

            echo "<br /><span style='color:'black';'>Acertadas: $intAcertadas <br />Incorrectas: " . (5-$intAcertadas) . "</span>";
            ?>
        </form>
    </body>
</html>