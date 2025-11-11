<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        if(isset($_GET["Alumnos"])) {

            $alumnos = [];

            foreach($_GET["Alumnos"] as $key => $value) {
                $alumnos[$key] = $value; 
            }

            echo "<pre>";
            print_r($alumnos);
            echo "</pre>";

            if(isset($_GET["añadir"])) {
                if(isset($_GET["NotasAlumno"]) && isset($_GET["NombreAlumno"])) {
                    $notaAlumno = $_GET["NotasAlumno"];
                    $nombreAlumno = $_GET["NombreAlumno"];
                    if($notaAlumno < 0 || $notaAlumno > 10 ) {
                        echo "Haz introducido una nota incorrecta. Porfavor ingresala otra vez.";
                        echo "<form action='Ejercicio2.php' method='get'>";
                        echo "<table>";
                        echo "<tr>";
                        echo "<td><label for='NombreAlumno'>Nombre del alumno: </td>";
                        echo "<td><input type='text' id='NombreAlumno' name='NombreAlumno' value='$nombreAlumno'></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><label for='NotasAlumno'>Nota del Alumno: </td>";
                        echo "<td><input type='number' id='NotasAlumno' name='NotasAlumno'></td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "</br>";
                        echo "<button type='submit' name='añadir'>Añadir</button>";
                        echo "<input type='submit' name='enviar'>";

                        foreach($alumnos as $key => $value) {
                            echo "<input type='hidden' name='Alumnos[$key]' value='$value'>";
                        }
                        
                        echo "</form>";

                        echo "<pre>";
                        print_r($alumnos);
                        echo "</pre>";
                    } else {
                        $alumnos[$nombreAlumno] = $notaAlumno;
                        echo "Puedes introducir mas alumnos";
                        echo "<form action='Ejercicio2.php' method='get'>";
                        echo "<table>";
                        echo "<tr>";
                        echo "<td><label for='NombreAlumno'>Nombre del alumno: </td>";
                        echo "<td><input type='text' id='NombreAlumno' name='NombreAlumno'></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><label for='NotasAlumno'>Nota del Alumno: </td>";
                        echo "<td><input type='number' id='NotasAlumno' name='NotasAlumno'></td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "</br>";
                        echo "<button type='submit' name='añadir'>Añadir</button>";
                        echo "<input type='submit' name='enviar'>";
                        foreach($alumnos as $key => $value) {
                            echo "<input type='hidden' name='Alumnos[$key]' value='$value'>";
                        }
                        echo "</form>";

                        echo "<pre>";
                        print_r($alumnos);
                        echo "</pre>";
                    }
                    
                } else {
                    echo "Introduce datos en los campos.";
                }
            } else if (isset($_GET['enviar'])) {
                $alumnos = [];

                foreach($_GET["Alumnos"] as $key => $value) {
                    $alumnos[$key] = $value; 
                }

                echo "<pre>";
                print_r($alumnos);
                echo "</pre>";

                echo "Alumnos: <br>";
                unset($alumnos[0]);
                foreach ($alumnos as $key => $value) {
                        echo "$key: $value<br>";
                }
            }
        } else {
            
            /*$nombreAlumno = "NombreAlumno";
            $notaAlumno = "Nota";
            $alumnos[$nombreAlumno] = $notaAlumno;*/
            echo "<form action='Ejercicio2.php' method='get'>";
            echo "<table>";
            echo "<tr>";
            echo "<td><label for='NombreAlumno'>Nombre del alumno: </td>";
            echo "<td><input type='text' id='NombreAlumno' name='NombreAlumno'></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td><label for='NotasAlumno'>Nota del Alumno: </td>";
            echo "<td><input type='number' id='NotasAlumno' name='NotasAlumno'></td>";
            echo "</tr>";
            echo "</table>";
            echo "</br>";
            echo "<button type='submit' name='añadir'>Añadir</button>";
            echo "<input type='submit' name='enviar'>";
            echo "<input type='hidden' name='Alumnos[]'>";
            echo "</form>";
        }

        
    
    ?>    
</body>
</html>