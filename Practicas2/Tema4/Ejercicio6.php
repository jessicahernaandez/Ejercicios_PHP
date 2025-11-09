<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <label for="palabraUsuario">Introduce una palabra:</label>
        <input type="text" name="palabraUsuario"><br />

        <input type="submit" name="enviar">
    </form>

    <?php 
    
        $miniDiccionario = ['perro' => 'dog', 'arbol' => 'tree', 'manzana' => 'apple', 'teclado' => 'keyboard', 
                            'raton' => 'mouse', 'computadora' => 'computer', 'ejercicio' => 'exercise', 'taza' => 'cup', 
                            'cafe' => 'coffee', 'lampara' => 'lamp', 'hermana' => 'sister', 'luna' => 'moon', 
                            'almohada' => 'pillow', 'armario' => 'wardrobe', 'guitarra' => 'guitar', 'piano' => 'piano', 
                            'libro' => 'book', 'lentes' => 'glasses', 'tacones' => 'heels', 'bolso' => 'handbag'];

        if(isset($_GET["palabraUsuario"])) {
            $palabraUsuario = trim(strtolower($_GET["palabraUsuario"]));

            if(isset($miniDiccionario[$palabraUsuario])) {
                echo "La traduccion al ingles de la palabra $palabraUsuario es: $miniDiccionario[$palabraUsuario]";
            } else {
                echo "Perdon, tu palabra no se encuentra en mi diccionario.";
            }
        }
    ?>
</body>
</html>