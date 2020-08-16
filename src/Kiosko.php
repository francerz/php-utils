<?php

namespace Francerz\Utils;

class Kiosko
{
    public static function getDigitoVerificador(string $str) : string
    {
        $vp = [2, 3, 4, 5, 6, 7];
        $x = 0;
        $sum = 0;
        $num_vp = count($vp);
        for ($i = strlen($str) - 1; $i >= 0; $i--) {
            $sum += $str[$i] * $vp[$x];
            $x = ($x + 1) % $num_vp;      
        }
        return $sum % 11 % 10;
    }

    public static function esValido(string $str) : bool
    {
        $digit = substr($str, -1);
        $str = substr($str, 0, -1);

        return static::getDigitoVerificador($str) === $digit;
    }
}