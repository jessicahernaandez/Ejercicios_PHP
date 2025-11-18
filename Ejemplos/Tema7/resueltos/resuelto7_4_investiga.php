<?php
    // strrev da la vuelta a una cadena
    function capicua(int $intNum):string{
        return ((string) $intNum)== strrev((string)$intNum)?'verdadero':'falso';
    }

    $titulo = "Resueltos 7.4 investiga";
    include("../general/cabecera.inc.php");

    //ucwords pone cada palabra de un texto en mayúscula la primera letra
    echo ucwords('En un lugar de la mancha') . "<br/>";
    echo ucwords('En|un|lugar|de|la|mancha', '|'); // indico el separador de palabras
    
    // str_repeat repite un texto dado tantas veces como indiquemos
    echo str_repeat( "<br/>", 3);

    //strrev da la vuelta a una cadena
    echo "¿Es capicua el número 12321? " . capicua(12321) . " <br/>";
    echo "¿Es capicua el número 1232? " . capicua(1232) . " <br/>";

    echo str_repeat( "<br/>", 3);
    
    //md5 saca el hash de un texto
    $strFirma = md5('Este es mi mensaje');
    echo "Uso de md5 <br/>";
    echo "cifrado $strFirma<br/>";
    echo "cifrado2 " . md5('Esto es otra prueba para ver la longitud del código md5') . "<br/>";
    echo "Es correcto el mensaje \"Mensaje privado\"? " . ($strFirma == md5("Mensaje privado")?'verdad':'falso') . " <br/>";
    echo "Es correcto el mensaje \"Este es mi mensaje\"? " . ($strFirma == md5('Este es mi mensaje')?'verdad':'falso') . " <br/>";

    include("../general/pie.inc.html");

?>
    