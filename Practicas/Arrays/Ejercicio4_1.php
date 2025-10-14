<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--Recorre el siguiente array multidimensional utilizando bucles anidados-->
    <?php 
        $strArrPersonas = [["Nombre" => "Pepito", "Edad" => 25], 
                            ["Nombre" => "Maria", "Edad" => 20]];
        
        foreach($strArrPersonas as $strArrPersona) {
            foreach($strArrPersona as $key => $value) {
                echo "$key: $value &nbsp;&nbsp;&nbsp;";
            }

            echo "<br />";
        }
    
    ?>
</html>