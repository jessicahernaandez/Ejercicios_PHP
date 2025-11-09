<?php 

    $miniDiccionario = ['perro' => 'dog', 'arbol' => 'tree', 'manzana' => 'apple', 'teclado' => 'keyboard', 
                            'raton' => 'mouse', 'computadora' => 'computer', 'ejercicio' => 'exercise', 'taza' => 'cup', 
                            'cafe' => 'coffee', 'lampara' => 'lamp', 'hermana' => 'sister', 'luna' => 'moon', 
                            'almohada' => 'pillow', 'armario' => 'wardrobe', 'guitarra' => 'guitar', 'piano' => 'piano', 
                            'libro' => 'book', 'lentes' => 'glasses', 'tacones' => 'heels', 'bolso' => 'handbag'];

     
        echo "Tus resultados: ";

        echo "<table border = 1>";
        echo "<tr>";
        echo "<th>Palabra</th><th>Tu respuesta</th><th>Traduccion</th><th>¿Acertada?</th>";
        echo "</tr>";
        foreach($miniDiccionario as $key => $value) {
            if(isset($_GET[$key])) {
                $acertada = $value == $_GET[$key] ? '✅': '❌';
                echo "<tr>";
                echo "<td>$key</td>";
                echo "<td>$_GET[$key]</td>";
                echo "<td>$value</td>";
                echo "<td>$acertada</td>";
                echo "</tr>";
            }
        }

        echo "</table>";


?>