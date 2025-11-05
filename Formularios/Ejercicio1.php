<?php 

    $noIntroducido = "No introducido";
    $nombre = $_GET["nombre"];
    $apellido1 = $_GET["Apellidos[0]"];
    $apellido2 = $_GET["Apellidos[1]"] ?? null;
    $email = isset($_GET["email"]) ?? null;
    $urlPersonal = isset($_GET["urlPersonal"]) ?? null;
    $sexo = isset($_GET["sexo"]) ?? null;
    $numConvivientes = isset($_GET["numConvivientes"]) ?? null;
    $aficciones = isset($_GET["aficciones"]);
    $comidas = isset($_GET["comidasFavoritas"]);

    echo "Los datos introducidos son:<br>";
    echo "Nombre:" . $nombre . "<br>";
    echo "Primer apellido: $apellido1<br>";
    echo "Segundo apellido: $apellido2<br>";
    echo "Email: $email<br>";
    echo "URL pagina personal: $urlPersonal<br>";
    echo "Sexo: $sexo<br>";
    echo "Numero de Convivientes en el domicilio: $numConvivientes<br>";

    echo "Aficciones:<br>";
    foreach($aficciones as $aficcion) {
        echo "$afficcion.<br>";
    }

    echo "Comidas Favoritas: <br>";
    foreach($comidas as $comida) {
        echo "$comida.<br>";
    }

    echo "<pre>";
    print_r($_GET);
    echo "</pre>";
    echo "<pre>";
    print_r($_GET["nombre"]);
    echo "</pre>";


?>