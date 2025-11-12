
    <?php 

        $titulo = "Parametros Variables";
        include("cabecera.inc.php");
    
        include("parametrosVariables.inc.php");

        // Primera funcion.
        $numMayor = mayor(3,6,10,23,17,54,1);

        echo "3,6,10,23,17,54,1";
        echo "<br>¿Cual es el numero mayor del conjunto anterior?: $numMayor";

        // Segunda funcion.
        $palabras = concatenar("Hola", "Luna", "Mundo");
        echo "<br>Cadena separado: $palabras";

        include("pie.inc.php");
    
    ?>
