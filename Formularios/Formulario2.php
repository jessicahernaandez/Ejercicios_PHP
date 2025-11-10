<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Formulario2.php" method="get">
        <table>
            <tr>
                <td><label for="nombreAlumno">Nombre del alumno: </td>
                <td><input type="text" id="nombreAlumno" name="nombreAlumno"></td>
            </tr>
            <tr>
                <td><label for="notaAlumno">Nota del Alumno: </td>
                <td><input type="number" id="notaAlumno" name="notaAlumno"></td>
            </tr>
        </table>
        </br>
        <input type="submit" name="añadir" value="Anadir">
        <button type="submit" name="mostrarResultados" formaction="muestraDatos2.php">Mostrar Resultados</button>

        <?php 
         
            if(isset($_GET["nombreAlumno"]) && isset($_GET["notaAlumno"])) {
                $nombreAlumno = $_GET["nombreAlumno"];
                $notaAlumno = $_GET["notaAlumno"];
                $alumnos = $_GET["alumnos"] ?? [];

                if($nombreAlumno !='' && $notaAlumno != '' && $notaAlumno >= 0 && $notaAlumno <= 10) {
                    echo "<br>Datos ingresados correctamente.";
                    $alumnos[$nombreAlumno] = $notaAlumno;
                } else {
                    if($notaAlumno < 0 || $notaAlumno > 10) {
                        echo "<br>La nota que haz introducido no es correcta. (Nota entre 0-10)";
                    } else {
                        echo "<br>Haz dejado algun campo vacio.";
                    }
                }

                //Generar campos ocultos
                foreach($alumnos as $nombre => $nota) {
                    echo "<input type='hidden' name='alumnos[$nombre]' value='$nota'>";
                }
                print_r($alumnos);
            }
            
        ?>

    </form>
</body>
</html>