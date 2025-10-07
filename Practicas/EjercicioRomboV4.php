<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="EjercicioRomboV4.php" method="get">
        <p><label for = "tamanio">Introduce una cantidad: </label>
        <input type="text" name="tamanio"></p>
        
        <p><input type="submit" name="enviar"></p>
    </form>

     <?php 

        echo "<br />";
        echo "<br />";

        if(isset($_GET["tamanio"])) {
            $intTamanio=$_GET["tamanio"]?:0;

            if($intTamanio > 0) {

                $intFila=1;

                for(;$intFila<=$intTamanio*2-1;$intFila++) {
                
                if($intFila<=$intTamanio) {
                    //Bucle para filas (Parte superior del rombo.)
                    for(;$intFila<=$intTamanio;$intFila++) {
                        //Bucle para los espacios externos
                        for($intEspacios=1;$intEspacios<=($intTamanio-$intFila);$intEspacios++) {
                            echo "&nbsp;&nbsp;";
                        }
                        echo "*";              
                    }

                } else {
                    $intFila=$intTamanio-1;
                     //Filas de la parte inferior
                    for(;$intFila>=1;$intFila--) {    
                        //Espacios externos
                        for($intEspacios=($intTamanio-$intFila);$intEspacios>=1;$intEspacios--) {
                            echo "&nbsp;&nbsp;";
                        }
                        echo "*";
                    }
                }
       
                if($intFila>1) {
                    //Bucle para los espacios internos
                    for($intDentro=1;$intDentro<=(2*$intFila-3);$intDentro++) {
                        echo "&nbsp;&nbsp;";
                    }

                    echo "*";
                }

                echo '<br />';
            }

            } else {
                echo "Porfavor, introduce al menos 1.";
            }
        }
 
    ?>
    
</body>
</html>