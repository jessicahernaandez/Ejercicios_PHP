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

                //sería lo normal en la mayoría de lenguajes de programación
                //me coloco al principio y al final de array y voy pasando por los números
                //si es impar el último me voy al anterior y sino lo pongo al principio y avanzo 1
                $intFin=count($intArray)-1;
                $intInicio=0;
                while($intInicio<$intFin){
                    if($intArray[$intFin]%2==1) //si el elemento del final es impar miro el anterior
                        $intFin--;
                    else{
                        $intAux=$intArray[$intFin];
                        $intArray[$intFin]=$intArray[$intInicio];
                        $intArray[$intInicio]= $intAux;
                        $intInicio++;
                    }
                }
                echo "<br />";
                //print_r($intArray);l
                for($intCont=0;$intCont<count($intArray);$intCont++)
                    echo "$intArray[$intCont] - ";

            ?>
    </body>
</html>
