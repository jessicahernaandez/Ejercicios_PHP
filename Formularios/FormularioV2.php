<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        //Hago verificaciones.
        $alumnos = $_GET["alumnos"] ?? [];
        $valorSeleccionado = "";

        if(isset($_GET["nombreAlumno"]) && isset($_GET["notaAlumno"])) {
            $nombreAlumno = $_GET["nombreAlumno"];
            $notaAlumno = $_GET["notaAlumno"];
            
            if($nombreAlumno != '' && $notaAlumno !='' && $notaAlumno >=0 && $notaAlumno <=10) {
                $alumnos[$nombreAlumno] = $notaAlumno;
                echo "<br>Datos ingresados correctamente";
            } else {
                if($notaAlumno < 0 || $notaAlumno >10) {
                    $valorSeleccionado = $_GET["nombreAlumno"];
                    echo "<br>Haz introducido una nota incorrecta.";
                } else {
                    echo "<br>Algun campo esta vacio.";
                }
            }
        }
    ?>
    <form action="FormularioV2.php" method="get">
        <table>
            <tr>
                <td><label for="nombreAlumno">Nombre del alumno: </td>
                <td><input type="text" id="nombreAlumno" name="nombreAlumno" value=<?=$valorSeleccionado?>></td>
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
            
            print_r($alumnos);
            foreach($alumnos as $nombres => $notas) {
                echo "<input type='hidden' name='alumnos[$nombres]' value='$notas'>";
            }
    ?>

    </form>
</body>
</html>