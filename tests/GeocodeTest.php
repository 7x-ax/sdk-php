<?php

namespace SevenEx\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use SevenEx\DTO\Geocode\GeocodeCollection as GeocodeDTO;
use SevenEx\DTO\Geocode\Location as LocationDTO;
use SevenEx\DTO\Common\Coordinates as CoordinatesDTO;
use SevenEx\SDK\Geocode;

class GeocodeTest extends TestCase
{
    public Geocode $g;
    protected function setUp(): void
    {
        $this->g = new Geocode(getenv('APIKEY'), LogLevel::DEBUG);
    }

    public function testGeocode()
    {
        $x = $this->g->geocode('London, UK');
        $this->assertInstanceOf(GeocodeDTO::class, $x);
        $this->assertInstanceOf(CoordinatesDTO::class, $x->objects[0]->coordinates);
        $this->assertInstanceOf(LocationDTO::class, $x->objects[0]->location);
    }

    public function testReverseGeocode()
    {
        $x = $this->g->reverse('55.55', '33.33');
        $this->assertInstanceOf(GeocodeDTO::class, $x);
        $this->assertInstanceOf(CoordinatesDTO::class, $x->objects[0]->coordinates);
        $this->assertInstanceOf(LocationDTO::class, $x->objects[0]->location);
    }

}