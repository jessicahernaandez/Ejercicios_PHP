<?php 
    $nombre = $_GET["nombre"] ?? null;
    $apellido1 = $_GET["apellidos"][0] ?? null;
    $apellido2 = $_GET["apellidos"][1] ?? null;
    $email = $_GET["email"] ?? null;
    $URLpersonal = $_GET["urlPersonal"] ?? null;
    $sexo = $_GET["sexo"] ?? null;
    $numConvivientes = $_GET["numConvivientes"] ?? null;
    $aficiones = $_GET["aficiones"] ?? null;
    $comidasFavoritas = $_GET["comidasFavoritas"] ?? null;
    
    echo "Nombre: $nombre<br>";
    echo "Primer Apellido: $apellido1<br>";
    echo "Segundo Apellido: $apellido2<br>";
    echo "Email: $email<br>";
    echo "URL Personal: $URLpersonal<br>";
    echo "Sexo: $sexo<br>";
    echo "Numero de Convivientes: $numConvivientes<br>";

    echo "Aficiones:<br>";
    foreach($aficiones as $key => $value) {
        echo "$value<br>";
    }

    echo "Comidas Favoritas:<br>";
    foreach($comidasFavoritas as $key => $value) {
        echo "$value<br>";
    }
    
    

?>