<?php 

$titulo = "Error apertura de ficheros";
    include("cabecera.inc.php");

    try {
        $fecha = getdate();
        print_r($fecha);
        if(!fopen("configuracion.txt", "rb")) { // Podemos generar que lo guarde en un log tambien.
            throw new Exception("Ha fallado la apertura del fichero");
        } else {
            // Aqui hacemos lo del ejercicio anterior.
        }
    } catch (Exception $e) {
        echo $e->getMessage() . "Nombre del fichero: " . $e->getFile();
    }

    include("pie.inc.php");



?>