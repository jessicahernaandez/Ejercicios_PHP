<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    
        //Palabras en español
        $strPalabras = ["perro", "manzana", "lampara", "computadora", "teclado", "raton", "cuaderno",
                    "lentes", "tacones", "lapiz", "bolso", "dinero", "television", "labial",
                    "vestido", "botella", "puerta", "cabello", "ojos", "poema"
                ];

        
        //Desordenamos
        shuffle($strPalabras);
        $strSeleccionadas = [];

        for($intCont=0;$intCont<5;$intCont++) {
            $strSeleccionadas[$intCont] = $strPalabras[$intCont];
        }

        $strPalabra='';

        echo "Introduce la traduccion de las siguientes palabras:  </br></br>";
        echo "<form action='Ejercicio4_7.php' method='get'>";
        echo "<table>";
        
        for($intCont=0;$intCont<count($strSeleccionadas);$intCont++) {
            $strPalabra = $strSeleccionadas[$intCont];
            echo "<tr>";
            echo "<td><label for='$strPalabra'>$strPalabra</td>";
            echo "<td><input type='text' name='$strPalabra'></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "<p><input type='submit' name='enviar'>";
        echo "</form>";       


    ?>
</body>
</html>