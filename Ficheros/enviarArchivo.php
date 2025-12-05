<?php

    $titulo="Enviar archivo";
    include("cabecera.inc.php");

?>

    <form enctype="multipart/form-data" action="Ejercicio3.php" method="post">
        Archivo: <input type="file" name="archivoConfiguracion"><br /><br />

        <input type="submit" name="enviar">

    </form>


<?php

    include("pie.inc.php");

?>