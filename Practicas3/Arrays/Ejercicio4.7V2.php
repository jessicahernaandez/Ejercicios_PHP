<form action="Ejercicio4.7V2P2.php" method="get"> 
<?php 

    $titulo = "Usuario Mini-Diccionario";
    include("cabecera.inc.php");

    $miniDiccionario = ['perro' => 'dog', 'arbol' => 'tree', 'manzana' => 'apple', 'teclado' => 'keyboard', 
                            'raton' => 'mouse', 'computadora' => 'computer', 'ejercicio' => 'exercise', 'taza' => 'cup', 
                            'cafe' => 'coffee', 'lampara' => 'lamp', 'hermana' => 'sister', 'luna' => 'moon', 
                            'almohada' => 'pillow', 'armario' => 'wardrobe', 'guitarra' => 'guitar', 'piano' => 'piano', 
                            'libro' => 'book', 'lentes' => 'glasses', 'tacones' => 'heels', 'bolso' => 'handbag'];

    $claves = array_keys($miniDiccionario);
    shuffle($claves);

    for($intCont=0;$intCont<5;$intCont++) {
        echo "<label for='$claves[$intCont]'>$claves[$intCont]</label>";
        echo "<input type='text' name='$claves[$intCont]'><br />";
    }

    include("pie.inc.php");

?>

<input type="submit" name="enviar">

</form>