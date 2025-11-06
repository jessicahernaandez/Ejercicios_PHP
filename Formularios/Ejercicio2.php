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
            $alumnos[] = $_GET["Alumnos"];

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
                        echo "<td><input type='text' id='NombreAlumno' name='NombreAlumno' value='$NombreAlumno'></td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo "<td><label for='NotasAlumno'>Nota del Alumno: </td>";
                        echo "<td><input type='number' id='NotasAlumno' name='NotasAlumno'></td>";
                        echo "</tr>";
                        echo "</table>";
                        echo "</br>";
                        echo "<button type='submit' name='añadir'>Añadir</button>";
                        echo "<input type='submit' name='enviar'>";
                        echo "<input type='hidden' name='Alumnos[]' value='Alumnos[$nombreAlumno][$notaAlumno]'>";
                        echo "</form>";
                    } else {
                        $alumnos[] = [$nombreAlumno => $notaAlumno];
                        echo "Haz introducido una nota incorrecta. Porfavor ingresala otra vez.";
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
                        echo "<input type='hidden' name='Alumnos[]' value='Alumnos[$nombreAlumno][$notaAlumno]'>";
                        echo "</form>";
                    }

                    echo "<pre>";
                    print_r($alumnos);
                    echo "</pre>";
                } else {
                    echo "Introduce datos en los campos.";
                }
            }
        } else {
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
            echo "</form>";
        }
    
    ?>    
</body>
</html>
