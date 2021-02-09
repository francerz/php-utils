<?php

use Francerz\Utils\DateTimeHelper;
use PHPUnit\Framework\TestCase;

class DateTimeHelperTest extends TestCase
{
    public function testToLongDate()
    {
        $actual = DateTimeHelper::toLongDate('2021-02-08', DateTimeHelper::LANG_ES);
        $expected = '8 de febrero de 2021';

        $this->assertEquals($expected, $actual);
    }
}