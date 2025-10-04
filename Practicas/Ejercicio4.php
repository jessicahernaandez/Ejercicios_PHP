<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--FORMULARIO-->
    <form action="Ejercicio4.php" method="get">
        <p><label for="tamanio">Ingrese el tamaño:</label>
        <input type ="text" name="tamanio"></p>
        
        <p><label for="cantidad">Ingresa la cantidad de triangulos: </label>
        <input type="text" name="cantidad"></p>
        
        <p><input type="submit" name="enviar"><p>
    </form>

    <!--TRIANGULOS-->
    <?php 
        if(isset($_GET["tamanio"]) && isset($_GET["cantidad"])) {
            $intTamanio=$_GET["tamanio"]?:0;
            $intCantidad=$_GET["cantidad"]?:0;

            if($intTamanio!=0 && $intCantidad!=0) {

                //Bucle para que repita los triangulos n veces
                for($intCont=1;$intCont<=$intCantidad; $intCont++) {

                    //Bucle para realizar la parte superior del triangulo
                    for($intFila=1;$intFila<=$intTamanio;$intFila++) {
                        for($intEstrellas=1;$intEstrellas<=$intFila;$intEstrellas++) {
                            echo "* ";
                        }

                        echo '<br />';
                    }

                    //Bucle para realizar la parte inferior del triangulo
                    for($intFila=$intTamanio-1;$intFila>=1;$intFila--) {
                        for($intEstrellas=$intFila;$intEstrellas>=1;$intEstrellas--) {
                            echo "* ";
                        }

                        echo '<br />';
                    }

                    echo '<br />';
                }
            }
        }
    
    ?>
</body>
</html>