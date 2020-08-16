<?php

use Francerz\Utils\Kiosko;
use PHPUnit\Framework\TestCase;

class KioskoTest extends TestCase
{
    public function testGetDigitoVerificador()
    {
        $dig = Kiosko::getDigitoVerificador('12345678901234567890123456');
        $this->assertEquals('0', $dig);
        $dig = Kiosko::getDigitoVerificador('65432109876543210987654321');
        $this->assertEquals('5', $dig);
        $dig = Kiosko::getDigitoVerificador('47275892734859382948757204');
        $this->assertEquals('1', $dig);
        $dig = Kiosko::getDigitoVerificador('1719460807162001002008232150');
        $this->assertEquals('9', $dig);
    }
}