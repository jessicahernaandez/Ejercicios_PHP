<?php
//Ejercicio 1: Calcula el precio con IVA de una variable
$intPrecio = 50;
const IVA = 1.21;

echo "El precio total es de " . $intPrecio*IVA . "<br />" . PHP_EOL;
echo "---------------------------------------------------------------------- <br />";
/*Guarda en una variable un nombre y muestralo en plural (usa
parentesis con la variable al imprimirla)*/
$strNombre = "Jessica";

//Dos maneras -> Primera
echo "Nombre en plural: " . $strNombre . "s<br />";
//Segunda manera
echo "Nombre en plural: ${strNombre}s <br />" . PHP_EOL;
echo "---------------------------------------------------<br />";

/*Guarda dos nombres de personas y sus respectivos sueldos
en variables. Muestra el mensaje similar al siguiente en
funcion de los valores "Pepe y Maria ganan juntos 5000$"*/ 
$strPrimerNombre = "Pepe";
$strSegundoNombre = "Maria";
$intSueldoPepe = 2500;
$intSueldoMaria = 2500;

//Primera forma
echo $strPrimerNombre . " y " . $strSegundoNombre . " ganan juntos " . ($intSueldoPepe+$intSueldoMaria) . "<br />";
//Segunda forma
echo "${strPrimerNombre} y ${strSegundoNombre} ganan juntos ($intSueldoPepe+$intSueldoMaria) <br />";

echo"-------------------------------------------------------------------------------------<br />";

//Probando operadores de Comparacion
//Operador nave espacial:
$intNum1= 5;
$intNum2 = 8;

//-1 cuando es menor, 0 igual y 1 cuando es mayor.
echo $intNum1 <=> $intNum2 . "<br />";

echo "<br /><br />";
//Operador funcion de null.
$a = 5;
$b;
$c = null;
$d = "Pepe";

echo "1.- " . ($a??$d) . "<br />";
echo "2.- " . ($b??$d) . "<br />";
echo "3.- " . ($b??"5") . "<br />";
echo "4.- " . ($b??$c) . "<br />";

?>