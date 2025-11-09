<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.04</title>
    </head>
    <body>
            <?php
                //genera 20 números aleatorios
                for($intCont=0;$intCont<20;$intCont++)
                    $intArray[]=rand(0,100);
                
                //print_r($intArray); //imprime el array
                for($intCont=0;$intCont<count($intArray);$intCont++)
                    echo "$intArray[$intCont] - ";

                //como al insertar un nuevo elemento lo mete al final, simplemente metos los impares de nuevo
                // eliminando su posición anterior
                $intElementos=count($intArray);
                for($intCount=0;$intCount<$intElementos;$intCount++){
                    if($intArray[$intCount]%2==1){ //si el elemento es impar lo coloco al final
                        $intArray[]=$intArray[$intCount];
                        unset($intArray[$intCount]);
                    }
                }
                array_merge($intArray);
                echo "<br />";
                print_r($intArray);
                /*for($intCont=0;$intCont<count($intArray);$intCont++)
                    echo "$intArray[$intCont] - ";*/

            ?>
    </body>
</html>
