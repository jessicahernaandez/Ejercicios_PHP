<html>
    <body>
            <?php

                $strArrAsignaturas = $_REQUEST["asignaturas"];

                echo "<br /> Asignaturas <br />";
                foreach ($strArrAsignaturas as $key=>$strAsignatura)
                    if(!is_array($strAsignatura))
                        echo "$key: $strAsignatura <br />"; // se imprime tal cual
                    else{
                        echo "Array $key<br />";
                        foreach ($strAsignatura as $clave=>$valor)
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;$clave: $valor <br />";
                    }
            ?>
    </body>
</html>