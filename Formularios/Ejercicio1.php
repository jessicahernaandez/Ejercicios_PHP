<?php 

    $noIntroducido = "No introducido";
    $nombre = $_GET["nombre"] ?? $noIntroducido;
    $apellido1 = $_GET["Apellidos"][0] ?? $noIntroducido;
    $apellido2 = $_GET["Apellidos"][1]?? $noIntroducido ;
    $email = $_GET["email"] ?? $noIntroducido;
    $urlPersonal = $_GET["urlPersonal"] ?? $noIntroducido;
    $sexo = $_GET["sexo"] ?? $noIntroducido;
    $numConvivientes = $_GET["numConvivientes"] ?? $noIntroducido;
    $aficiones = $_GET["aficiones"] ?? null;
    $comidas = $_GET["comidasFavoritas"] ?? null;

    echo "Los datos introducidos son:<br>";
    echo "Nombre: $nombre <br>";
    echo "Primer apellido: $apellido1<br>";
    echo "Segundo apellido: $apellido2<br>";
    echo "Email: $email<br>";
    echo "URL pagina personal: $urlPersonal<br>";
    echo "Sexo: $sexo<br>";
    echo "Numero de Convivientes en el domicilio: $numConvivientes<br><br>";

    echo "Aficiones:<br>";
    foreach($aficiones as $aficion) {
        echo "$aficion.<br>";
    }

    echo "<br><br>Comidas Favoritas: <br>";
    foreach($comidas as $comida) {
        echo "$comida.<br>";
    }




?>