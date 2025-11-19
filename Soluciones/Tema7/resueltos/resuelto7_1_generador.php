<?php
    function letraAleatoria():string{
        $chrLetra = chr(rand(ord('a'),ord('z')));
        if(rand(0,1))
            $chrLetra = strtoupper($chrLetra);
        return $chrLetra;
    }

    $titulo = "Resueltos 7.1 generador";
    include("../general/cabecera.inc.php");

    echo letraAleatoria();
    include("../general/pie.inc.html");
?>
    