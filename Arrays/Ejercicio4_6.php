<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 

        $miniDiccionario = ["perro" => "dog", "manzana" => "apple", "lampara" => "lamp", "computadora" => "computer",
                            "teclado" => "keyboard","raton" => "mouse","cuaderno" => "notebook","lentes" => "glasses",
                            "tacones" => "heels", "lapiz" => "pencil","bolso" => "bag","dinero" => "money", "television" => "television",
                            "labial" => "lipstick","vestido" => "dress","botella" => "bottle","puerta" => "door","cabello" => "hair",
                            "ojos" => "eyes","poema" => "poem"
                        ];

    
        if(isset($_GET['palabraUsuario'])) {
            $palabraUsuario = trim($_GET['palabraUsuario']);
            $palabraUsuario = strtolower($palabraUsuario);

            if(empty($palabraUsuario)) {
                echo "No has escrito ninguna palabra.";
            } else {
                
                if(isset($miniDiccionario[$palabraUsuario])) {
                    echo "<strong>Palabra introducida:</strong> $palabraUsuario<br/>";
                    $traduccion = $miniDiccionario[$palabraUsuario];
                    echo "<strong>Su traduccion:</strong> $traduccion";
                } else {
                    echo "Lo siento, tu palabra no se ecuentra en mi diccionario";
                }
            }
        }
        
    ?>
</body>
</html>