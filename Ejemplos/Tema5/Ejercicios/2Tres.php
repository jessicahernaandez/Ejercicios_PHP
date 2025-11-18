<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 5.2</title>
    </head>

    <body>
        <?php
            $arrValores = [];
            if (isset($_REQUEST['valores']) && $_REQUEST['valores'] != '') // Si existe lo meto en un array
                $arrValores = unserialize($_REQUEST['valores']);

            if (isset($_REQUEST['nombre']) && $_REQUEST['nombre'] != '' && // Si me manda nombre y nota lo meto en el array
                isset($_REQUEST['nota']) && $_REQUEST['nota'] != '') {
                $nombre = $_REQUEST['nombre'];
                $nota = $_REQUEST['nota'];
                $arrValores[$nombre] = $nota; // guardo el elemento nombre=>nota
            }

            // Serializamos el array actualizado
            $strValores = serialize($arrValores);
echo "valor serializado $strValores <br><br>";
        ?>

    <form>
        Nombre:<input type="text" name="nombre" pattern="[A-Za-z]{1,15}" title="Solo puede contener de 1 a 15 letras"><br />
        Nota:<input type="number" name="nota" min="0" max="10" step="0.01"><br />
        <input type="hidden" name="valores" value="<?= htmlspecialchars($strValores); ?>">

        <input type="submit" value="Añadir">
        <button type="submit" name="mostrar" value="1">Mostrar Resultados</button>
    </form>

    <hr>

    <?php
    // Si se pulsa el botón Mostrar y tenemos valores
    if (isset($_REQUEST['mostrar']) )
        if(!empty($arrValores)){
            $suma = 0;
            $contador = 0;

            echo "<h2>Listado de notas:</h2>";
            foreach ($arrValores as $nombre => $nota) {
                echo htmlspecialchars($nombre) . ": " . htmlspecialchars($nota) . "<br>";
                $suma += $nota;
                $contador++;
            }

            if ($contador > 0) {
                $media = $suma / $contador;
                echo "<br />Media: " . number_format($media, 2) . "</br>";
            }
        }else
            echo "<h2>No se han enviado valores</h2>";
    ?>
    </body>
</html>