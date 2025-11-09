<html>
    <body>
            <?php

                $strArrAsignaturas = $_REQUEST["asignaturas"];

                echo "<br /> Asignaturas <br />";
                foreach ($strArrAsignaturas as $key=>$strAsignatura)
                    echo "$key: $strAsignatura <br />";
            ?>
    </body>
</html>