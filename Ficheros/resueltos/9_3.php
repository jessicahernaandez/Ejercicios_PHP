<?php
    function parametro(int $intNum):string{
        $strDevolver ="No se pudo abrir el archivo configuracion.log o no se tiene dicho parámetro";
        if($fichero=fopen('configuracion.log','rb')){
            $intCont=0; //indica el parámetro en el que estamos
            while(!feof($fichero) && $intNum>$intCont){
                $strLinea=trim(fgets($fichero));
                if(!str_starts_with($strLinea,'#')){ //$strLinea!='#'
                    $arrParametro=explode(':',$strLinea);
                    if(count($arrParametro)>=2){ // si no he cogido clave valor no me sirve
                        $intCont++;//he leido otro parámetro
                        if($intCont==$intNum)
                            $strDevolver = $arrParametro[1];
                        //echo "parámetro $intCont clave " . $arrParametro[0] . " valor " . $arrParametro[1] . "<br>";
                    }
                }
            }
            fclose($fichero);
            if($intCont<$intNum)
                $strDevolver ="No hay tantos parámetros en el archivo configuracion.log";
        }

        return $strDevolver;
    }

    function listarParame(){
        if($fichero=fopen('configuracion.log','rb')){
            $intCont=0; //indica el parámetro en el que estamos
            while(!feof($fichero)){
                $strLinea=fgets($fichero);
                if(!str_starts_with($strLinea,'#')){
                    $arrParametro=explode(':',trim($strLinea));
                    if(count($arrParametro)>=2){ // si no he cogido clave valor no me sirve
                        $intCont++;//he leido otro parámetro
                        echo "parámetro $intCont clave " . $arrParametro[0] . " valor " . $arrParametro[1] . "<br>";
                    }
                }
            }
            fclose($fichero);
        }else
            echo "No se pudo abrir el archivo configuracion.log";
    }

    echo "muestra un parámetro " . parametro(1);
    echo "<h3>Todos los parámetros</h3>";
    listarParame();
    $titulo = "resueltos 9.3";
    include("../general/cabecera.inc.php");



    
    include("../general/pie.inc.html");
?>
