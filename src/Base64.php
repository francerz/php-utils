<?php

namespace Francerz\Utils;

abstract class Base64
{
    public static function encode(string $data)
    {
        return base64_encode($data);
    }

    public static function decode(string $base64, bool $strict = false)
    {
        return base64_decode($base64, $strict);
    }

    public static function encodeUrl(string $data)
    {
        return strtr(static::encode($data), ['+'=>'-', '/'=>'_', '='=>'']);
    }

    public static function decodeUrl(string $base64, bool $strict = false)
    {
        return static::decode(
            strtr($base64, '-_', '+/') .
            str_repeat('=', - strlen($base64) & 3)
        , $strict);
    }

    public static function crypto($length)
    {
        return substr(static::encode(random_bytes(ceil($length * 3 / 4))), 0, $length);
    }

    public static function cryptoUrl($length)
    {
        return substr(static::encodeUrl(random_bytes(ceil($length * 3 / 4))), 0, $length);
    }
}