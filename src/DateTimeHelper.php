<?php

namespace Francerz\Utils;

use DateTime;
use InvalidArgumentException;
use RuntimeException;

abstract class DateTimeHelper
{
    const LANG_EN = 'en';
    const LANG_ES = 'es';

    private static $longDateFormats = [DateTimeHelper::LANG_EN => '{month} {day} {year}'];

    private static $months = [DateTimeHelper::LANG_EN => [
        'January','February','March','April','May','June',
        'July','August','September','October','November','December'
    ]];

    public static function toLongDate($dateTime, $lang = DateTimeHelper::LANG_EN)
    {
        if (is_int($dateTime)) {
            $dateTime = new DateTime("@$dateTime");
        }
        if (!$dateTime instanceof DateTime) {
            $dateTime = new DateTime($dateTime);
        }
        $format = static::getLocalizedFormat($lang);

        return strtr($format, array(
            '{day}' => $dateTime->format('j'),
            '{month}' => static::getLocalizedMonth($lang, $dateTime->format('n')),
            '{year}' => $dateTime->format('Y')
        ));
    }

    public static function getLocalizedMonth(string $lang, $monthNum)
    {
        if ($monthNum < 1 || $monthNum > 12) {
            throw new InvalidArgumentException('Invalid Month number [ 1 - 12 ]');
        }
        if (!isset(static::$months[$lang])) {
            $lang = DateTimeHelper::LANG_EN;
        }
        return static::$months[$lang][$monthNum-1];
    }

    public static function addLocalizedMonths(string $lang, array $months)
    {
        if (count($months) != 12) {
            throw new InvalidArgumentException('Months array must be 12 length');
        }
        static::$months[$lang] = $months;
    }

    public static function getLocalizedFormat(string $lang)
    {
        if (!isset(static::$longDateFormats[$lang])) {
            $lang = DateTimeHelper::LANG_EN;
        }
        return static::$longDateFormats[$lang];
    }
    public static function addLocalizedLongDateFormat(string $lang, string $format)
    {
        static::$longDateFormats[$lang] = $format;
    }
}

DateTimeHelper::addLocalizedMonths(DateTimeHelper::LANG_ES, array(
    'enero','febrero','marzo','abril','mayo','junio',
    'julio','agosto','septiembre','octubre','noviembre','diciembre'
));
DateTimeHelper::addLocalizedLongDateFormat(DateTimeHelper::LANG_ES, '{day} de {month} de {year}');