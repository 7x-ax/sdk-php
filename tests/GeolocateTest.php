<?php

namespace SevenEx\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use SevenEx\DTO\Geolocate\Geolocate as GelolocateDTO;
use SevenEx\SDK\Geolocate;

class GeolocateTest extends TestCase
{
    public Geolocate $gl;
    protected function setUp(): void
    {
        $this->gl = new Geolocate(getenv('APIKEY'));
    }

    public function testIp()
    {
        $x = $this->gl->ip('109.74.197.73');
        $this->assertInstanceOf(GelolocateDTO::class, $x);
        $this->assertEquals('US', $x->isp_country->iso_code);
    }

}