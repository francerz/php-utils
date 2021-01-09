<?php

use Francerz\Utils\Base64;
use PHPUnit\Framework\TestCase;

class Base64Test extends TestCase
{
    public function testEncodeUrl()
    {
        $testStr = '<test>go?y';
        $encoded = Base64::encode($testStr);
        $this->assertEquals('PHRlc3Q+Z28/eQ==', $encoded);

        $encodedUrl = Base64::encodeUrl($testStr);
        $this->assertEquals('PHRlc3Q-Z28_eQ', $encodedUrl);

        $this->assertEquals($testStr, Base64::decode($encoded, true));
        $this->assertEquals($testStr, Base64::decodeUrl($encodedUrl, true));
    }

    public function testCrypto()
    {
        $crypto = Base64::crypto(2);
        $this->assertEquals(2, strlen($crypto));

        $crypto = Base64::cryptoUrl(2);
        $this->assertEquals(2, strlen($crypto));
    }
}