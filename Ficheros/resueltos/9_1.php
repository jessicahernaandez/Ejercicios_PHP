<?php
    $titulo = "resueltos 9.1";
    include("../general/cabecera.inc.php");
    // si se han cargado los ficheros
    if(is_uploaded_file($_FILES['1']['tmp_name']) && is_uploaded_file($_FILES['2']['tmp_name'])){
        $fichero1 = $_FILES['1']['name'];
        $fichero2 = $_FILES['2']['name'];
        // si son ficheros de texto
        if(str_ends_with(trim($fichero1) ,"txt") && str_ends_with(trim($fichero2) ,"txt")){
            move_uploaded_file($_FILES['1']['tmp_name'], "$fichero1");
            move_uploaded_file($_FILES['2']['tmp_name'], "$fichero2");
            $contenidoFichero1 = file_get_contents($fichero1);
            $contenidoFichero2 = file_get_contents($fichero2);

            $tamanioFichero1 = strlen($contenidoFichero1);
            $tamanioFichero2 = strlen($contenidoFichero2);

            $resultado = "";
            if ($tamanioFichero1 === $tamanioFichero2 && $contenidoFichero1 === $contenidoFichero2) {
                $resultado = "Totalmente IGUAL\nTamaño: " . $tamanioFichero1 . " bytes\nCONTENIDO IGUAL\nContenido 1 y 2: " . $contenidoFichero1;
            } else if ($tamanioFichero1 === $tamanioFichero2 && $contenidoFichero1 !== $contenidoFichero2) {
                $resultado = "TAMAÑO IGUAL\nTamaño: " . $tamanioFichero1 . " bytes\nCONTENIDO DIFERENTE\nContenido 1: " . $contenidoFichero1 . "\nContenido 2: " . $contenidoFichero2;
            } else {
                $resultado = "TAMAÑO DIFERENTE\nTamaño: " . $tamanioFichero1 . "bytes - " . $tamanioFichero2 . "bytes\nCONTENIDO DIFERENTE\nContenido 1: " . $contenidoFichero1 . "\nContenido 2: " . $contenidoFichero2;
            }
            /*# Escribir el resultado en el archivo de salida
            file_put_contents("resultado.txt", $resultado);*/
            echo "<pre>$resultado</pre>\n";
            unlink("$fichero1");
            unlink("$fichero2");
        }else
            echo "Los ficheros enviados no son de texto";
    }else
        echo "No se han enviado dos ficheros";

    include("../general/pie.inc.html");
?>