<?php
    echo "<form method=\"get\"><style>a.fich{color: black;text-decoration: none;}a{color: blue;text-decoration: none;}</style>";
    // si ha mandado ubicación se coje, sino se pone la ubicación actual
    $strUbicacion = isset($_GET["dir"])?$_GET["dir"]:getcwd();
    echo "<b>$strUbicacion</b><br />";
    chdir($strUbicacion); // cambio a la ubicación indicada
    //muestra el fichero si existe
    if(isset($_GET["fichero"])){
        echo '<pre>';
        readfile($_GET["fichero"]);
        echo "</pre><br /><br />\n";
    }
    $strArrListado=scandir($strUbicacion); // cojemos contenido del directorio
    foreach($strArrListado as $strValor)
        if(is_file($strValor)) // si es un fichero genero su link
            echo "<a class=\"fich\" href=\"9_2.php?dir=$strUbicacion&fichero=$strValor\">$strValor</a> <br />\n";
        else if($strValor=='.')
                echo "";//<a href=\"9_2.php?dir=$strUbicacion\">$strValor</a> <br />";
             else if($strValor=='..'){
                    $strUbicacionAux = substr($strUbicacion,0,(strrpos($strUbicacion,'\\')));
                    echo "<a href=\"9_2.php?dir=$strUbicacionAux\">$strValor</a> <br />\n";
                  }else{
                    echo "<a href=\"9_2.php?dir=$strUbicacion\\$strValor\">$strValor</a> <br />\n";
                    //echo "<input type=\"submit\" formaction=\"9_2.php?dir=$strUbicacion\\$strValor\">$strValor<br />\n";
                 //se podría hacer con javascript y un campo oculto llamado dir. La función tendría que ejecutarse y hacer ella el envío
                   }

?>