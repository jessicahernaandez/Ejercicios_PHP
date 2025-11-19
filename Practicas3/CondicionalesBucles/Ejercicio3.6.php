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

    $titulo = "Triangulo 90º Mas";
    include("cabecera.inc.php");

    if(isset($_GET["tamanio"]) && isset($_GET["cantidad"])) {
        $tamanio = $_GET["tamanio"];
        $cantidad = $_GET["cantidad"] ?? 0;

        
            for($intFila=1;$intFila<=$tamanio;$intFila++) {
                $cantidad = $_GET["cantidad"] ?? 0;
                while($cantidad != 0) {
                    //Me genero los espacios
                    for($intEspacios=1;$intEspacios<=$tamanio-$intFila;$intEspacios++) {
                        echo "&nbsp;&nbsp;";
                    }

                    for($intEstrellas=1;$intEstrellas<=($intFila*2-1);$intEstrellas++) {
                        echo "*";
                    }

                    for($intEspacios=1;$intEspacios<=$tamanio-$intFila;$intEspacios++) {
                        echo "&nbsp;&nbsp;";
                    }
                    $cantidad--;
                    echo "&nbsp;&nbsp;";
                }    
                echo "<br>";
        } 
    }

    include("pie.inc.php");

?>