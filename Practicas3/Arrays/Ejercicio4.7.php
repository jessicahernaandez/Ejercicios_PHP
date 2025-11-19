
<form action="Ejercicio4.7P2.php" method="get"> 
<?php 

    $titulo = "Usuario Mini-Diccionario";
    include("cabecera.inc.php");

    $miniDiccionario = ['perro' => 'dog', 'arbol' => 'tree', 'manzana' => 'apple', 'teclado' => 'keyboard', 
                            'raton' => 'mouse', 'computadora' => 'computer', 'ejercicio' => 'exercise', 'taza' => 'cup', 
                            'cafe' => 'coffee', 'lampara' => 'lamp', 'hermana' => 'sister', 'luna' => 'moon', 
                            'almohada' => 'pillow', 'armario' => 'wardrobe', 'guitarra' => 'guitar', 'piano' => 'piano', 
                            'libro' => 'book', 'lentes' => 'glasses', 'tacones' => 'heels', 'bolso' => 'handbag'];

    $arrNumAleatorios = [];

    while(count($arrNumAleatorios) < 5) {
        $intAux = rand(0,19);
        if(!in_array($intAux, $arrNumAleatorios)) {
            $arrNumAleatorios[] =  $intAux;
        }
        
    }

    $intContEncontrada = 0;
    $intContIndice = 0;
    foreach($miniDiccionario as $palabraEspaniol => $palabraIngles) {
        if(in_array($intContEncontrada, $arrNumAleatorios)) {
            echo "<label for='palabraEspaniol$intContIndice'>$palabraEspaniol</label>";
            echo "<input type='text' name='palabraIngles$intContIndice'><br />";
            echo "<input type='hidden' name='palabraEspaniol$intContIndice' value='$palabraEspaniol'>";
            $intContIndice++;
        }
        $intContEncontrada++;
    }

    include("pie.inc.php");

?>

<input type="submit" name="enviar">

</form>