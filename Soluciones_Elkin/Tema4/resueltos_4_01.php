<html>

    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
		<title>Resuelto 4.01</title>
	</head>

    <body> 
		<?php
            $strArrPersonas = array(array("Nombre" => "Pepe", "Edad" => 25),
									array("Nombre" => "María", "Edad" => 20));
			//vamos a copiar los elementos que faltan de un array en otro
            foreach($strArrPersonas as $arrPersona){
                foreach($arrPersona as $key=>$value)//cojo la clave y el valor de cada elemento
                    echo " $key: $value &nbsp;&nbsp;&nbsp;";
				echo '<br />';
            }

            echo '<br /><br />Segunda manera:<br />';
            //tiene menos sentido pero puedo hacer
            foreach($strArrPersonas as $arrPersona){
                foreach($arrPersona as $valor)//cojo solo el valor
                    echo "$valor ";
                echo '<br />';
            }

        echo '<br /><br />Tercera manera:<br />';
        //tiene menos sentido porque tengo que conocer los elementos del array
        foreach($strArrPersonas as $arrPersona){
            echo "nombre :  ". $arrPersona['Nombre'] . '&nbsp;&nbsp;&nbsp;';
            echo "edad : " . $arrPersona['Edad'];
            echo '<br />';
        }
        ?>
    </body>

</html>