<?php
/*Poner el nombre al usuario en una variable denominada 'nombre'
Poner el primer apellido al usuario en una variable denominada 'apellido1'
Almacenaremos en una nueva variable denominada 'fullName', el nombre y primer apellido
registrado separados por un espacio
Poner la edad al usuario en una variable denominada 'edad'
Calcularemos y asignaremos a una nueva variable 'year' el anio de nacimiento del usuario (sin
tener en cuenta el mes de nacimiento. Consideramos simplemente que estamos en el anio 2024)
Mostrara en el cuadro de resultados del editor la siguiente informacion (una en cada linea):
* Nombre completo: (valor de la variable 'fullName')
* Anio de nacimiento: (valor de la variable 'year')
 */

$strNombre = "Andrea";
$strApellido1 = "Hernandez";
$strFullName = $strNombre . " " . $strApellido1;
$intEdad = 14;
$intYear = 2025 - $intEdad;

echo "Nombre completo: $strFullName <br />";
echo "Anio de nacimiento: $intYear <br />";

/*Continuando con el ejercicio anterior, hacer lo siguiente:
 Si el usuario es menor de 18 anios, le saldra, debajo de su nombre completo y anio de nacimiento, el
mensaje: <Eres menor de edad, no podemos darte de alta hasta el anio XXXX> (XXXX sera el anio en que
tendra 18 anios y que deberemos calcular previamente) (se recomienda usar un if( ) aunque no se haya
explicado todabia)*/

if ($intEdad < 18) {
    echo "Eres menor de edad, no podemos darte de alta hasta el anio " . (18-$intEdad+2025);
}


?>