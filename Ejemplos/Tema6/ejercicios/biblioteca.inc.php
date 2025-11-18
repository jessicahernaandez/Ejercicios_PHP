<?php
    function suma(int $intA, int $intB) : int {
        return is_numeric($intA) && is_numeric($intB) ? $intA + $intB : 0;
    }

    function resta(int $intA, int $intB) : int {
        return is_numeric($intA) && is_numeric($intB) ? $intA - $intB : 0;
    }

    function multiplica(int $intA, int $intB) : int {
        return is_numeric($intA) && is_numeric($intB) ? $intA * $intB : 0;
    }

    function divide(int $intA, int $intB) : int {
        return is_numeric($intA) && is_numeric($intB) ? $intA / $intB : 0;
    }

?>