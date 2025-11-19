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

    $titulo = "Rombo";
    include("cabecera.inc.php");

    if(isset($_GET["tamanio"])) {
        $tamanio = $_GET["tamanio"];

        for($intFila=1;$intFila<=$tamanio;$intFila++) {

            //Espacios
            for($intEspacios=1;$intEspacios<=$tamanio-$intFila;$intEspacios++) {
                echo "&nbsp;&nbsp;";
            }

            //Estrellas
            for($intEstrellas=1;$intEstrellas<=($intFila*2-1);$intEstrellas++) {
                echo "*";
            }

            echo "<br/>";
        }

        //Parte inferior
        for($intFila=$tamanio-1;$intFila>0;$intFila--) {

            //Espacios
            for($intEspacios=$tamanio-$intFila;$intEspacios>0;$intEspacios--) {
                echo "&nbsp;&nbsp;";
            }

            //Estrellas
            for($intEstrellas=($intFila*2-1);$intEstrellas>0;$intEstrellas--) {
                echo "*";
            }

            echo "<br/>";
        }  
    }

    include("pie.inc.php");

?>