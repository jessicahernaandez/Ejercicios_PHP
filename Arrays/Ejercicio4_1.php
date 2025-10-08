<?php 

//Recorre el siguiente array multidimensional utilizando bucles anidados.
 
/*Forma tradicional de recorrerlo.
$strArrayPersonas = array(array("Nombre" => "Pepe", "Edad" => 25), 
                        array("Nombre" => "Maria", "Edad" => 20));

    foreach($strArrayPersonas as $strPersona) {
        echo "Nombre: " . $strPersona['Nombre'] . ", Edad: " . $strPersona['Edad'] . '<br />';
    }*/

    $strArrayPersonas = [["Nombre" => "Pepe", "Edad" => 25], 
                        ["Nombre" => "Maria", "Edad" => 20]];  

    //3 maneras de hacerlo con foreach

    //Bucles anidados, tomando los dos valores.
    echo "Primera forma: <br />";
    foreach($strArrayPersonas as $strArrPersona) {
        foreach($strArrPersona as $key=>$value) { //Tomo la clave y el valor.
            echo "$key: $value &nbsp; &nbsp; &nbsp";
        }
        echo "<br />";
    }

    echo "<br /><br />";

    //Bucles anidados, pero solo imprimiendo el valor
    echo "Segunda forma: <br />";
    foreach($strArrayPersonas as $ArrPersona) {
        foreach($ArrPersona as $valor){
            echo $valor . "&nbsp;&nbsp;&nbsp;";
        }
        echo "<br />";
    }

    echo "<br/><br/>";

    //Con un solo bucle, para esta forma debemos saber la clave del array.
    echo "Tercera forma: <br/>";
    foreach($strArrayPersonas as $ArrPersona) {
        echo "Nombre: " . $ArrPersona['Nombre'] . "&nbsp;&nbsp;&nbsp;Edad: " . $ArrPersona['Edad'] . '<br/>';
    }

    echo "<br/>";





?>