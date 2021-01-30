<?php

use Francerz\Utils\HTML;
use PHPUnit\Framework\TestCase;

class HTMLTest extends TestCase
{
    public function testFormatDate()
    {
        $actual = HTML::formatDate('2021-01-29 17:30:15-06:00');

        $this->assertEquals('2021-01-29', $actual);
    }

    public function testFormatTime()
    {
        $actual = HTML::formatTime('2021-01-29 17:30:15-06:00');

        $this->assertEquals('17:30:15', $actual);
    }

    public function testFormatDateTime()
    {
        $actual = HTML::formatDateTime(1611941415);

        $this->assertEquals('2021-01-29T17:30:15', $actual);
    }
}