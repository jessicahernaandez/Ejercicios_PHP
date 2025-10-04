<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <!--FORMULARIO-->
    <form action="Ejercicio5.php" method="get">
        <p><label for="tamanio">Ingrese el tamaño:</label>
        <input type ="text" name="tamanio"></p>
        
        <p><input type="submit" name="enviar"></p>
    </form>

    <?php 
        if(isset($_GET["tamanio"])) {
            $intTamanio=$_GET["tamanio"]?:0;

            if($intTamanio!=0) {

                //Bucle para definir filas
                for($intFila=1;$intFila<=$intTamanio;$intFila++) {
                    
                    //Bucle para los espacios
                    for($intEspacios=1;$intEspacios<=($intTamanio-$intFila);$intEspacios++) {
                        echo "&nbsp;&nbsp;";
                    }
                    
                    //Bucle para las estrellas
                    for($intEstrellas=1;$intEstrellas<=(2*$intFila-1);$intEstrellas++) {
                            echo "*";
                    }

                    echo '<br />';
                    
                }
            }
        }
    ?>
</body>
</html>