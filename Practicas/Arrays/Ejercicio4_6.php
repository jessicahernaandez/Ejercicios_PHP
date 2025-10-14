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

        if(isset($_GET['palabraUsuario'])) {
            $palabraUsuario = trim($_GET['palabraUsuario']); //Para borrar espacios en blancos.
            $palabraUsuario = strtolower($palabraUsuario); //Pasamos a minusculas.

            if(empty($palabraUsuario)) {
                echo "No haz introducido ninguna palabra";
            } else {
                if(isset($miniDiccionario[$palabraUsuario])) {
                    echo "Palabra: $palabraUsuario</br>";
                    echo "Traduccion: $miniDiccionario[$palabraUsuario]";
                } else {
                    echo "Lo siento, tu palabra no esta en mi diccionario.";
                }
            }
        } 
    ?>
</body>
</html>