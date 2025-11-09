<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.04</title>
    </head>
    <body>
            <?php
                for($intCont=0;$intCont<20;$intCont++)
                    $intArray[]=rand(0,100);

                //print_r($intArray);
                for($intCont=0;$intCont<count($intArray);$intCont++)
                    echo "$intArray[$intCont] - ";
                
                $intFin=count($intArray)-1;
               $intInicio=0;
                while($intInicio<$intFin){
                    //mejora respecto al anterio al ir al siguiente par e impar directamente
                    for(;$intInicio<$intFin && $intArray[$intFin]%2==1;$intFin--);
                    for(;$intInicio<$intFin && $intArray[$intInicio]%2==0;$intInicio++);
                    if($intInicio<$intFin){
                        $intAux=$intArray[$intFin];
                        $intArray[$intFin]=$intArray[$intInicio];
                        $intArray[$intInicio]= $intAux;
                    }
                }
                echo "<br />";
                //print_r($intArray);
                for($intCont=0;$intCont<count($intArray);$intCont++)
                    echo "$intArray[$intCont] - ";

            ?>
    </body>
</html>
