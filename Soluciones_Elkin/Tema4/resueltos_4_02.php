<html>

    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Resuelto 4.02</title>
	</head>

    <body> 
		<?php
            //vamos a copiar los elementos que faltan de un array en otro
            $intArray[1] = 1;
            $intArray[7] = 2;
            $intArray[3] = 3;
            echo '<br /> array desordenado: ';
            print_r($intArray);
            echo '<br />Listo el array ordenado: ';
            //listamos el array ordenado, pero no lo ordeno realmente
            for($intCont=0,$intElementos=0;$intElementos<count($intArray);$intCont++)
                if(isset($intArray[$intCont])){
                    $intElementos++;
                    echo "$intCont => " . $intArray[$intCont] . ", ";
                }
            echo '<br /> array sigue sin estar ordenado: ';
            print_r($intArray);

            //borramos e insertamos los elementos en la posición indicada
            for($intCont=0,$intElementos=0;$intElementos<count($intArray);$intCont++)
                if(isset($intArray[$intCont])){
                    $intElementos++;
                    $intAux = $intArray[$intCont];
                    unset($intArray[$intCont]);
                    $intArray[$intCont] = $intAux;
                }
            echo '<br /> array ordenado: ';
            print_r($intArray);


            //con un foreach lo puedo hacer también
        $intArray=[1=>1,7=>2,3=>9,5=>3];

        $intMaxIndice = 0;
        foreach($intArray as $intCont=>$intElemento){
            //$intArray[$intCont] = $intElemento;//guardo este elemento como último
            if($intCont > $intMaxIndice)//si elemento tiene el índice más alto, almacenar que es el más alto
                $intMaxIndice = $intCont;
            else //si hay elementos mayores, recorro el array volviendo a colocar esos elementos en su lugar
                foreach($intArray as $intClave=>$intValor)
                    if($intClave > $intCont) {
                        unset($intArray[$intClave]);
                        $intArray[$intClave] = $intValor;
                    }
        }
        echo '<br /> array ordenado por foreach: ';
        print_r($intArray);

        $intArray=[1=>1,7=>2,3=>9,5=>3];
        $intArray[7] = 22;//guardo este elemento como último
        echo '<br /> prueba: ';
        print_r($intArray);
        ?>
    </body>

</html>