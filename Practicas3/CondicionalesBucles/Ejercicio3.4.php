<?php 

    $tamanio = $_GET["tamanio"] ?? 0;
    $cantidad = $_GET["cantidad"] ?? 0;

    $valorTamanio = $tamanio != 0 ? $tamanio : '';
    $valorCantidad = $cantidad != 0 ? $cantidad : '';

?>

<form>
    <label for="tamanio">Introduce el tamaño: </label>
    <input type="number" name="tamanio" value=<?=$valorTamanio?>><br/>

    <label for="cantidad">Cuantos triangulos: </label>
    <input type="number" name="cantidad" value=<?=$valorCantidad?>><br/>

    <input type="submit" name="enviar">
</form>

<?php 

    $titulo = "Triangulo mas";
    include("cabecera.inc.php");

    if(isset($_GET["tamanio"]) && isset($_GET["cantidad"])) {
        $tamanio = $_GET["tamanio"];
        $cantidad = $_GET["cantidad"];

        while($cantidad != 0) {
             //Me creo la primera parte.
            for($intFila=1;$intFila<=$tamanio;$intFila++) {
                for($intColumna= 1;$intColumna<=$intFila;$intColumna++) {
                    echo " * ";
                } 
                echo "<br>"; 
            }

            for($intFila=$tamanio-1;$intFila>=1;$intFila--) {
                for($intColumna=1;$intColumna<=$intFila;$intColumna++) {
                    echo " * ";
                }
                echo "<br>";
            }

            echo "<br>";

            $cantidad--;
        }
        
    }

    include("pie.inc.php");

?>