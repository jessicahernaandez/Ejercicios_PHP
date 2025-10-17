<?php
    /*Escribe un programa que, dada una posición en un tablero de 
    ajedrez, nos diga a qué casillas podría saltar un alfil que se 
    encuentra en esa posición. Indícalo de forma gráfica sobre el 
    tablero con un color diferente para estas casillas donde puede 
    saltar la figura. El alfil se mueve siempre en diagonal. El tablero 
    cuenta con 64 casillas. Las columnas se indican con las letras de la 
    "a" a la "h" y las filas se indican del 1 al 8.*/

    if(isset($_GET['fila']) && isset($_GET['columna'])) {
        $intFilaUsuario = $_GET['fila'];
        $strColumnaUsuario = $_GET['columna'];

        $intFilas = [ ,1,2,3,4,5,6,7,8];
        $strColumnas = ['', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h'];
    }


?>