<?php 
    $tamanio = $_GET["tamanio"] ?? 0;
    $valorTamanio = $tamanio != 0 ? $tamanio : '';
?>

<form>
    <label for="tamanio">Introduce el tamaño: </label>
    <input type="number" name="tamanio" value=<?=$valorTamanio?>><br/>


    <input type="submit" name="enviar">
</form>

<?php 

    $titulo = "Triangulo 90º";
    include("cabecera.inc.php");

    if(isset($_GET["tamanio"])) {
        $tamanio = $_GET["tamanio"];

        for($intFila=1;$intFila<=$tamanio;$intFila++) {

            //Me genero los espacios
            for($intEspacios=1;$intEspacios<=$tamanio-$intFila;$intEspacios++) {
                echo "&nbsp;&nbsp;";
            }

            for($intEstrellas=1;$intEstrellas<=($intFila*2-1);$intEstrellas++) {
                echo "*";
            }

            echo "<br>";
        }
        
    }

    include("pie.inc.php");

?>