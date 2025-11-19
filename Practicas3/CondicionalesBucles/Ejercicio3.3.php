
<form>
    <label for="tamanio">Introduce el tamaño: </label>
    <input type="text" name="tamanio">

    <input type="submit" name="enviar">
</form>

<?php 

    $titulo = "Triangulo";
    include("cabecera.inc.php");

    if(isset($_GET["tamanio"])) {
        $tamanio = $_GET["tamanio"];

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
        
    }

    include("pie.inc.php");

?>