

<h3>Selector de Colores</h3>
<p>Elija un color haciendo clic en él:</p>
<form action=" " method="get">
    <p><input type="image" name="imagen" alt="Cuatro colores" src="cuatro-colores.svg" height="150"></p>
</form>

<?php

    $titulo = "Colores";
    include("cabecera.inc.php");

    $imagenX = $_GET["imagen_x"] ?? '';
    $imagenY = $_GET["imagen_y"] ?? '';
    $color = '';

    if($imagenX != '' && $imagenY != '') {
        if($imagenX >= 0 && $imagenX <= 80 && $imagenY >= 0 && $imagenY <= 80) {
            $color = "azul";
        } else if ($imagenX > 90 && $imagenX < 150 && $imagenY >= 0 && $imagenY <= 80) {
            $color = "amarillo";
        } else if ($imagenX >= 0 && $imagenX <= 80 && $imagenY >= 90 && $imagenY <= 150) {
            $color = "rojo";
        } else if ($imagenX >= 90 && $imagenX <=150 && $imagenY >= 90 && $imagenY <= 150) {
            $color = "verde";
        }

        echo "Ha elegido el color <strong>$color</strong>. Elija de nuevo. ";
    } else {
        echo "Elija un color haciendo clic en él:";
    }


    include("pie.inc.php");

?>