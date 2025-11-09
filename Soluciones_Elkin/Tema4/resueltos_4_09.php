<html >
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Resuelto 4.09</title>
        <style>
            table {
                border-collapse: collapse;
                margin: 20px;
            }
            td {
                padding: 5px;
            }
            table, th, td {
                border: 1px solid blue;
            }
        </style>
    </head>

    <body>
        <h1 style="text-align:center;">Tetris</h1>
        <form action="resueltos_4_09_Dos.php" >
            <table>
                <?php
                for ($intFila = 0; $intFila < 10; $intFila++) {
                    echo "<tr>";
                    for ($intColumna = 0; $intColumna < 10; $intColumna++) {
                        // Generamos un nombre único para cada checkbox";
                        echo "<td><input type='checkbox' name='pixel[$intFila][$intColumna]'></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </table>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>
