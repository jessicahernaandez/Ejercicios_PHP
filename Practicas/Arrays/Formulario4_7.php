<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $strPalabras = ['perro', 'arbol', 'manzana', 'teclado', 'raton', 'computadora', 'ejercicio', 
        'taza', 'cafe', 'lampara', 'hermana', 'luna', 'almohada', 'armario', 'guitarra', 'piano', 
        'libro', 'lentes', 'tacones', 'bolso'];

        //Ordenamos de manera aleatoria.
        shuffle($strPalabras);

        $strSeleccionadas = [];
        for($intCont=0;$intCont<5;$intCont++) {
            $strSeleccionadas[$intCont] = $strPalabras[$intCont];
        }

        echo "Pon la traduccion en ingles de las siguientes palabras: <br/><br/>";
        echo "<form action='Ejercicio4_7.php' method='get'>";
        echo "<table>";
        for($intCont=0;$intCont<count($strSeleccionadas);$intCont++) {
            $palabra=$strSeleccionadas[$intCont];
            echo "<tr>";
            echo "<td><label for='$palabra'>$palabra</label></td>";
            echo "<td><input type='text' name='$palabra'></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<p><input type='submit' name='enviar'></p>";
        echo "</form>";

    ?>
    
</body>
</html>