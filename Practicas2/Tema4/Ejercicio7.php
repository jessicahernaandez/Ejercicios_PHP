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

        $arrClaves = array_keys($miniDiccionario);
        shuffle($arrClaves);

        echo "<h3>Introduce su respectiva traduccion: </h3>";
        echo "<form action='Ejercicio7P2.php' method='get'>";
        echo "<table>";
        for($intCont=0;$intCont<5;$intCont++) {
            echo "<tr>";
            echo "<td><label for='$arrClaves[$intCont]'>$arrClaves[$intCont]</label></td>";
            echo "<td><input type='text' name='$arrClaves[$intCont]'></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<input type='submit' name='enviar'>";
        echo "</form>";

    ?>
</body>
</html>