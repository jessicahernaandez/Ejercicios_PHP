<?php

    $titulo = "dosFicheros";
    include("cabecera.inc.php");

    // Apertura de ficheros
    $ficheroUno = fopen("ficheroUno.txt", "rb"); // Lectura
    $ficheroDos = fopen("ficheroDos.txt", "rb");

    // Lectura de ficheros.

    // readfile te devuelve la cantidad de letras que tiene y te muestra el contenido.
    // $devuelve = readfile('ficheroUno.txt');
    // readfile('ficheroDos.txt');

    //print($devuelve);

    $lineaCompleta1 = '';
    while(!feof($ficheroUno)) {
        $linea = fgets($ficheroUno);
        $lineaCompleta1 .= $linea;
        echo "$linea<br />";
    }

    $lineaCompleta2 = '';
    while(!feof($ficheroDos)) {
        $linea = fgets($ficheroDos);
        $lineaCompleta2 .= $linea;
        echo "$linea<br />";
    }

    $tamañoFichero1 = filesize("ficheroUno.txt");
    $tamañoFichero2 = filesize("ficheroDos.txt");

    echo "<br />";
    if ($lineaCompleta1 == $lineaCompleta2) {
        echo "<br />-Los dos ficheros tienen el mismo contenido";
        echo "<br />-Cantidad de letras: $tamañoFichero1";
    } else {
        echo "<br />-Los dos ficheros son distintos";
        if($tamañoFichero1 == $tamañoFichero2) {
            echo "<br />-Tienen la misma longitud.";
            echo "<br />-Longitud : $tamañoFichero1";
        } else {
            echo "<br />-Tienen distinta longitud";
            echo "<br />-Cantidad de 'ficheroUno.txt': $tamañoFichero1";
            echo "<br />-Cantidad de 'ficheroDos.txt': $tamañoFichero2";
        }
    }

    // Cerrar ficheros.
    fclose($ficheroUno);
    fclose($ficheroDos);

    // file_get_contents -> Te convierte el fichero en una cadena, y asi ya puedes comprobar si son iguales y con strlen tienes la longitud.

    echo "<br />";
    include("pie.inc.php");



?>