<?php 

    if(isset($_GET["alumnos"])) {
        $alumnos = $_GET["alumnos"];
        $sumaNotas = 0;

        foreach($alumnos as $nombres => $notas) {
            $sumaNotas += $notas;
            echo "$nombres: $notas<br>";
        }

        $media = $sumaNotas / count($alumnos);

        echo "La media de las notas es de: $media";


    } else {
        echo "No haz introducido alumnos, ni sus notas.";
    }

?>