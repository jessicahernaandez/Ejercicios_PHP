<?php 

    $miniDiccionario = ['perro' => 'dog', 'arbol' => 'tree', 'manzana' => 'apple', 'teclado' => 'keyboard', 
                            'raton' => 'mouse', 'computadora' => 'computer', 'ejercicio' => 'exercise', 'taza' => 'cup', 
                            'cafe' => 'coffee', 'lampara' => 'lamp', 'hermana' => 'sister', 'luna' => 'moon', 
                            'almohada' => 'pillow', 'armario' => 'wardrobe', 'guitarra' => 'guitar', 'piano' => 'piano', 
                            'libro' => 'book', 'lentes' => 'glasses', 'tacones' => 'heels', 'bolso' => 'handbag'];

    $intAcertadas = 0;
    for($intCont=0;$intCont<5;$intCont++) {
        $strPalabraIngles = $_GET['palabraIngles'.$intCont] ?? '';
        $strPalabraEspaniol = $_GET['palabraEspaniol'.$intCont] ?? '';

        echo "$strPalabraEspaniol:</br>";
        echo "Tu respuesta: $strPalabraIngles</br>";
        echo "Traduccion: $miniDiccionario[$strPalabraEspaniol]</br>";
        if($strPalabraIngles == $miniDiccionario[$strPalabraEspaniol]) {       
            echo "CORRECTO.</br>";
            $intAcertadas++;
        } else {
            echo "INCORRECTO.</br>";
        }
    }

    echo "Aciertos: $intAcertadas</br>";
    echo "Errores: " . (5 - $intAcertadas);


?>