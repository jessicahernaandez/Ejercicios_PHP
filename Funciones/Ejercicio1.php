
    <?php 

        $titulo = "Funciones";
        include("cabecera.inc.php");
        include("arrayPar.php");
        
        // Primera Funcion. Averigua si es Par.
        $strEsPar = esPar(5) ? "Es Par" : "No es Par";
        echo "¿El numero 5 es par? " . $strEsPar . "<br>";
        $strEsPar = esPar(2) ? "Es Par" : "No es Par";
        echo "¿El numero 2 es par? " . $strEsPar . "<br>";

        // Segunda Funcion. Devuelve un array con numeros especificandole su tamaño,
        // numero minimo y maximo.
        $arrNumAleatorios = arrayAleatorio(8,7,23);
        echo "<br><br>Array con 8 numeros aleatorios entre 7 y 23:<br>";
        foreach($arrNumAleatorios as $key => $value) {
            echo "$key: $value<br>";
        }

        // Tercera Funcion. Nos devuelve la cantidad de numeros pares que se 
        // encuentran en un array. 
        $cuantosPares = arrayPares($arrNumAleatorios);
        echo "<br>¿Cuantos numeros Pares hay en el array anterior?: $cuantosPares<br>";

        include("pie.inc.php");

    ?>
