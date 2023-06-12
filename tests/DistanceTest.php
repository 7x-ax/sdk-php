<?php

namespace SevenEx\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use SevenEx\DTO\Distance\Distance as DistanceDTO;
use SevenEx\DTO\Distance\DistanceCoordinates;
use SevenEx\DTO\Distance\DistanceMeta;
use SevenEx\SDK\Distance;

class DistanceTest extends TestCase
{
    public Distance $d;
    protected function setUp(): void
    {
        $this->d = new Distance(getenv('APIKEY'));
    }

    public function testDistanceByCoordinates()
    {
        $x = $this->d->getByCoordinates(22.2223, 33.3334, 33.444,44.555);
        $this->assertInstanceOf(DistanceDTO::class, $x);
        $this->assertEquals(2517.44, $x->distance);
        $this->assertEquals('km', $x->unit);
        $this->assertInstanceOf(DistanceMeta::class, $x->meta);
        $this->assertInstanceOf(DistanceCoordinates::class, $x->meta->coordinates);
    }

    public function testDistanceByAddressWithMiles()
    {
        $x = $this->d->getByAddress('Trafalgar Square, London, UK', 'Tower Bridge, London, UK', 'mi');
        $this->assertInstanceOf(DistanceDTO::class, $x);
        $this->assertEquals(2.28, $x->distance);
        $this->assertEquals('mi', $x->unit);
        $this->assertInstanceOf(DistanceMeta::class, $x->meta);
        $this->assertInstanceOf(DistanceCoordinates::class, $x->meta->coordinates);
    }

}