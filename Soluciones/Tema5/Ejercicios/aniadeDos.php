<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 5.2</title>
</head>

<body>
    
            <?php
                $rlnMedia=0;
                if(isset($_REQUEST['nombres']) && isset($_REQUEST['notas'])){
                    $strArrNombres = $_REQUEST['nombres'];
                    $rlnArrNotas = $_REQUEST['notas'];
                    for($intCont=0; $intCont<count($rlnArrNotas); $intCont++){
                        $rlnMedia+=$rlnArrNotas[$intCont];
                        echo $strArrNombres[$intCont] . " " . $rlnArrNotas[$intCont] . "<br />";
                    }
                }

                echo "Media: " . ($rlnMedia/count($rlnArrNotas));
            ?>

</body>

</html>