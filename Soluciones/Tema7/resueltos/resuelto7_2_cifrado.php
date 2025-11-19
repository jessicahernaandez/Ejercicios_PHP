<?php
    function strCifra(string $strCadena, int $intDesplazamiento):string{
        $strArrCadena = str_split($strCadena);
        $strDevolver='';
        echo "<br><br>  ";
        foreach($strArrCadena as $chrCar){
            if(ctype_alpha($chrCar)){
                $chrCar=chr(ord($chrCar)+$intDesplazamiento);
                //$chrCar++; // si se usa, de A pasará a AA
                if($chrCar>'z'|| $chrCar>'Z' && $chrCar<'a')// || ($chrCar>ord('a') && $chrCar>'z'))
                    // le quito al caracter que tengo la longitud del abecedario (lo que hay de a-z mas uno)
                    $chrCar = chr(ord($chrCar)-(ord('z')-ord('a')+1));
            }
            $strDevolver .= $chrCar;
        }
        return ($strDevolver);
    }

    $titulo = "Resueltos 7.2 cifrado";
    include("../general/cabecera.inc.php");

    echo strCifra("Hola ,. Z es mejor que z", 3);

    include("../general/pie.inc.html");
?>
    