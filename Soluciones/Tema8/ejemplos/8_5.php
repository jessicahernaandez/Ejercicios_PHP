<?php
    $intNumero = 123;
    printf("Con 2 decimales: %1\$.2f<br />Sin decimales: %1\$u",$intNumero);
    
    $str1 = "Hello";
    $str2 = "Hello world!";
    echo "<br>";
    printf("[%s]<br>",$str1); // imprime una cadena
    printf("\"%8s\"<br>",$str1); // imprime como mínimo 8 caracteres rellenando a la izquierda con blancos
    printf("\"%-8s\"<br>",$str1); // imprime como mínimo  8 caracteres rellenando a la derecha con blancos
    printf("\"%08s\"<br>",$str1); // imprime como mínimo  8 caracteres rellenando a la izquierda con 0
    printf("\"%'*8s\"<br>",$str1); // imprime como mínimo  8 caracteres rellenando a la izquierda con *
    printf("\"%8s\"<br>",$str2); // imprime como mínimo 8 caracteres rellenando a la izquierda con blancos
    printf("\"%8.8s\"<br>",$str2); // imprime solamente 8 caracteres rellenando a la izquierda con blancos

    $rlnNumeros = array(0.001, 0.002, 0.003, 0.004, 0.005, 0.006, 0.007, 0.008, 0.009, 2327);
    foreach ($rlnNumeros as $rlnValor)
        print $rlnValor."->".number_format($rlnValor, 2, "'", ".")."<br>";

?>