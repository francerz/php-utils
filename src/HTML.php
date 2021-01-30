<?php

namespace Francerz\Utils;

use DateTime;

abstract class HTML
{
    const DATE_FORMAT = 'Y-m-d';
    const TIME_FORMAT = 'H:i:s';
    const DATETIME_FORMAT = 'Y-m-d\TH:i:s';

    private static function toFormatString($datetime)
    {
        if (is_numeric($datetime)) {
            return "@$datetime";
        }
        return $datetime;
    }

    public static function formatDate($date)
    {
        $date = static::toFormatString($date);
        $dt = new DateTime($date);
        return $dt->format(static::DATE_FORMAT);
    }

    public static function formatTime($time)
    {
        $time = static::toFormatString($time);
        $dt = new DateTime($time);
        return $dt->format(static::TIME_FORMAT);
    }

    public static function formatDateTime($datetime)
    {
        $datetime = static::toFormatString($datetime);
        $dt = new DateTime($datetime);
        return $dt->format(static::DATETIME_FORMAT);
    }
}