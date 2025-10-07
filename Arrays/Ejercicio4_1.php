<?php 

//Recorre el siguiente array multidimensional utilizando bucles anidados.
    
$strArrayPersonas = array(array("Nombre" => "Pepe", "Edad" => 25), 
                        array("Nombre" => "Maria", "Edad" => 20));

    foreach($strArrayPersonas as $strPersona) {
        echo "Nombre: " . $strPersona['Nombre'] . ", Edad: " . $strPersona['Edad'] . '<br />';
    }

?>