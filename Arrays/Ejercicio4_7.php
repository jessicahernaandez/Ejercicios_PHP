<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        //Copiamos el diccionario del ejercicio anterior
        $miniDiccionario = ["perro" => "dog", "manzana" => "apple", "lampara" => "lamp", "computadora" => "computer",
                            "teclado" => "keyboard","raton" => "mouse","cuaderno" => "notebook","lentes" => "glasses",
                            "tacones" => "heels", "lapiz" => "pencil","bolso" => "bag","dinero" => "money", "television" => "television",
                            "labial" => "lipstick","vestido" => "dress","botella" => "bottle","puerta" => "door","cabello" => "hair",
                            "ojos" => "eyes","poema" => "poem"
                        ];

        $strRespuestas = [];
        $intAciertos = 0;
        $intErrores = 0;

        foreach($miniDiccionario as $palabra => $traduccion) {
            if(isset($_GET[$palabra])) {
                $strRespuestaUsuario = $_GET[$palabra];
                $strRespuestas[$palabra] = strtolower($strRespuestaUsuario);

                if($strRespuestaUsuario === $traduccion) {
                    $intAciertos++;
                } else {
                    $intErrores++;
                }
            } 
        }

        echo "<table>";
        echo "<tr><td>Aciertos: </td>";
        echo "<td>$intAciertos</td></tr>";
        echo "<tr><td>Errores: </td>";
        echo "<td>$intErrores</td></tr>";
        echo "</table>";

        echo "</br> Detalles de tu resultado:</br></br>";
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Palabras</th>";
        echo "<th>Traduccion</th>";
        echo "<th>Tu respuesta</th>";
        echo "<th>¿Correcto?</th>";
        echo "</tr>";

        foreach($strRespuestas as $palabra => $respuesta) {
            $traduccion = $miniDiccionario[$palabra];
            echo "<tr>";
            echo "<td style='text-align:center;'>$palabra</td>";
            echo "<td style='text-align:center;'>$traduccion</td>";
            echo "<td style='text-align:center;'>$respuesta</td>";
            
            if($respuesta === $traduccion) {
                echo "<td>✅</td>";
            } else {
                echo "<td>❌</td>";
            }

            echo "</tr>";
        }

        echo "</table>";

    ?>
</body>
</html>