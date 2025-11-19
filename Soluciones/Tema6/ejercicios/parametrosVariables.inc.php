<?php
    function mayor(): int{

        if(func_num_args()>0){ // si se han recibido parámetros
            $intArrParametros = func_get_args();
            $intMayor= $intArrParametros[0];
            foreach($intArrParametros as $intValor)
                if($intMayor<$intValor)
                    $intMayor = $intValor;
        }else
            $intMayor = 0; //como no puedo devolver null, entiendo que si no envía nada devuelvo 0
        return $intMayor;
    }

    function concatenar(...$strArrPalabras) : string{
        $strPalabras = '';
        foreach($strArrPalabras as $strValor)
            $strPalabras .= $strValor . ' ';
        
        return $strPalabras;
    }
?>