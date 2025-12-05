<?php
    $titulo = "resueltos 9.1";
    include("../general/cabecera.inc.php");

    echo "<form method=\"post\" enctype=\"multipart/form-data\" action=\"9_1.php\">";
    for($intCont=1; $intCont<3; $intCont++)
        echo "<input type=\"file\" name=\"$intCont\"><br /><br />";
    echo "<input type=\"submit\" value=\"Enviar\"><br />";
    echo "</form><br /><br />";

    include("../general/pie.inc.html");
?>
