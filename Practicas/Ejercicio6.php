
    <?php 
        if(isset($_GET["tamanio"])) {
            $intTamanio=$_GET["tamanio"]?:0;

            if($intTamanio!=0) {

                //Bucle para definir filas
                for($intFila=1;$intFila<=$intTamanio;$intFila++) {
                    
                    for($intTriangulos=1;$intTriangulos<=30;$intTriangulos++) {
                        
                        //Bucle para los espacios
                        for($intEspacios=1;$intEspacios<=($intTamanio-$intFila);$intEspacios++) {
                            echo "&nbsp;&nbsp;";
                        }
                    
                        //Bucle para las estrellas
                        for($intEstrellas=1;$intEstrellas<=(2*$intFila-1);$intEstrellas++) {
                            echo "*";
                        }

                        //Bucle para los espacios
                        for($intEspacios=1;$intEspacios<=($intTamanio-$intFila);$intEspacios++) {
                            echo "&nbsp;&nbsp;";
                        }

                    }

                    echo '<br />';
                    
                }
            }
        }
    ?>
