<?php 
    // Utilizando las funciones para trabajar con caracteres, a partir de una 
    // cadena y un desplazamiento:
    // 🞚 Si el desplazamiento es 1, sustituye la A por B, la B por C, etc.
    // 🞚 El desplazamiento no puede ser negativo.
    // 🞚 Si se sale del abecedario, debe volver a empezar.
    // 🞚 Hay que respetar los espacios, puntos y comas.

    function cadenaUnDesplazamiento (string $cadena) : string {

        $cadenaNueva = "";
        for($intCont=0;$intCont<strlen($cadena);$intCont++) {
            $chrCaracter = $cadena[$intCont];
            if(!ctype_space($chrCaracter) && !ctype_punct($chrCaracter)) { //Si no es un caracter de puntuacion, hacemos el dezplazamiento.
                $chrCaracter = ord($chrCaracter);
                //Volvemos al principio.
                if($chrCaracter == 90) {
                    $chrCaracter = 65;
                } else if ($chrCaracter == 122) {
                    $chrCaracter = 97;
                }
                
                $chrCaracterNuevo = chr($chrCaracter + 1);
            }

            $cadenaNueva += $chrCaracterNuevo;
        }

        return $cadenaNueva;
    }

    echo "Cadena 'ABCabczZ con desplazamiento en 1: '". cadenaUnDesplazamiento("ABCabczZ");

?>