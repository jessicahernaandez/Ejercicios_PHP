<?php 

    $miniDiccionario = ['perro' => 'dog', 'arbol' => 'tree', 'manzana' => 'apple', 'teclado' => 'keyboard', 
                            'raton' => 'mouse', 'computadora' => 'computer', 'ejercicio' => 'exercise', 'taza' => 'cup', 
                            'cafe' => 'coffee', 'lampara' => 'lamp', 'hermana' => 'sister', 'luna' => 'moon', 
                            'almohada' => 'pillow', 'armario' => 'wardrobe', 'guitarra' => 'guitar', 'piano' => 'piano', 
                            'libro' => 'book', 'lentes' => 'glasses', 'tacones' => 'heels', 'bolso' => 'handbag'];

    $aciertos = 0;
    foreach($miniDiccionario as $español => $ingles) {
        if(isset($_GET[$español])) {
            echo "Palabra $español.<br />";
            echo "Tu respuesta: $_GET[$español]<br />";
            echo "Traduccion: $ingles<br />";
            if($_GET[$español] == $ingles) {
                $correcto = "CORRECTO";
                $aciertos++;
            } else {
                $correcto = "INCORRECTO";
            }
            
            echo $correcto. "<br />";
            echo "<br />";
        }
    }


    echo "Aciertos: $aciertos<br />";
    echo "Errores:" . (5 - $aciertos). "<br />";


?>