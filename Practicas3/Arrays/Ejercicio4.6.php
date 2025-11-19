
<?php 
    $palabraUsuario = $_GET['palabraEspaniol'] ?? '';
?>
<h3>Mini-diccionario</h3>
<form>
    <label for="palabraEspaniol">Introduce una palabra: </label>
    <input type="text" name="palabraEspaniol" value=<?=$palabraUsuario?>>

    <input type="submit" name="enviar">
</form>


<?php 

    $titulo = "Mini-Diccionario.";
    include("cabecera.inc.php");

    $miniDiccionario = ['perro' => 'dog', 'arbol' => 'tree', 'manzana' => 'apple', 'teclado' => 'keyboard', 
                            'raton' => 'mouse', 'computadora' => 'computer', 'ejercicio' => 'exercise', 'taza' => 'cup', 
                            'cafe' => 'coffee', 'lampara' => 'lamp', 'hermana' => 'sister', 'luna' => 'moon', 
                            'almohada' => 'pillow', 'armario' => 'wardrobe', 'guitarra' => 'guitar', 'piano' => 'piano', 
                            'libro' => 'book', 'lentes' => 'glasses', 'tacones' => 'heels', 'bolso' => 'handbag'];


    if(isset($_GET['palabraEspaniol'])) {
        $palabraUsuario = trim(strtolower($_GET['palabraEspaniol']));

        if(isset($miniDiccionario[$palabraUsuario])) {
            echo "¡Tu palabra $palabraUsuario se encuentra en el miniDiccionario!<br />";
            echo "**Traduccion: $miniDiccionario[$palabraUsuario]<br />";
        } else {
            echo "Lo siento, tu palabra no se encuentra en mi diccionario.<br />";
        }
    }


    include("pie.inc.php");
?>