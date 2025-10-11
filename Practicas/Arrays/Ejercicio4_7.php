<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        $miniDiccionario = ['perro' => 'dog', 'arbol' => 'tree', 'manzana' => 'apple', 'teclado' => 'keyboard', 
        'raton' => 'mouse', 'computadora' => 'computer', 'ejercicio' => 'exercise', 'taza' => 'cup', 
        'cafe' => 'coffee', 'lampara' => 'lamp', 'hermana' => 'sister', 'luna' => 'moon', 
        'almohada' => 'pillow', 'armario' => 'wardrobe', 'guitarra' => 'guitar', 'piano' => 'piano', 
        'libro' => 'book', 'lentes' => 'glasses', 'tacones' => 'heels', 'bolso' => 'handbag'];
        
        $strRespuestas=[];
        $intAciertos = 0;
        $intErrores = 0;

        //El _GET tambien se puede iterar, para saber las respuestas del usuario.
        foreach($miniDiccionario as $palabra => $traduccion) {
            if(isset($_GET[$palabra])) {
                $strRespuestaUsuario=$_GET[$palabra];
                $strRespuestas[$palabra] = $strRespuestaUsuario;

                if($strRespuestaUsuario == $traduccion) {
                    $intAciertos++;
                } else {
                    $intErrores++;
                }
            }
            
        }

        //Ahora que ya tenemos las respuestas del usuario, comparamos con las originales.
        echo "Resultados: <br/>";
        echo "<table>";
        echo "<tr><td><strong>Aciertos:</strong> $intAciertos</td></tr>";
        echo "<tr><td><strong>Errores:</strong> $intErrores</td></tr>";
        echo "</table>";

        echo "<br/>Detalles del Resultado: <br/><br/>";
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Palabras</th>";
        echo "<th>Traduccion</th>";
        echo "<th>Tus respuestas</th>";
        echo "<th>¿Correcto?</th>";
        echo "</tr>";

        foreach($strRespuestas as $palabra => $respuesta) {
            $traduccion = $miniDiccionario[$palabra];
            echo "<tr>";
            echo "<td style='text-align:center;'>$palabra</td>";
            echo "<td style='text-align:center;'>$traduccion</td>";
            echo "<td style='text-align:center;'>$respuesta</td>";
            
            if($respuesta === $traduccion) {
                echo "<td style='text-align:center;'>✅</td>";
            } else {
                echo "<td style='text-align:center;'>❌</td>";
            }

            echo "</tr>";
        }

        echo "</table>";

        
    ?>
</body>
</html>