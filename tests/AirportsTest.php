<?php

namespace SevenEx\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use SevenEx\DTO\Airports\Types as TypesDTO;
use SevenEx\DTO\Airports\ContinentsCollection as ContinentsCollectionDTO;
use SevenEx\DTO\Airports\ContinentCollection as ContinentCollectionDTO;
use SevenEx\DTO\Airports\CountriesCollection as CountriesCollectionDTO;
use SevenEx\DTO\Airports\Airports as AirportsDTO;
use SevenEx\DTO\Airports\SingleAirports as SingleAirportsDTO;
use SevenEx\SDK\Airports;

class AirportsTest extends TestCase
{
    public Airports $a;
    protected function setUp(): void
    {
        $this->a = new Airports(getenv('APIKEY'));
    }

    public function testTypes()
    {
        $x = $this->a->types();
        $this->assertInstanceOf(TypesDTO::class, $x);
    }

    public function testContinents()
    {
        $x = $this->a->continents();
        $this->assertInstanceOf(ContinentsCollectionDTO::class, $x);
    }

    public function testContinent()
    {
        $x = $this->a->continent('EU');
        $this->assertInstanceOf(ContinentCollectionDTO::class, $x);
    }

    public function testCountries()
    {
        $x = $this->a->countries();
        $this->assertInstanceOf(CountriesCollectionDTO::class, $x);
    }

    public function testCountry()
    {
        $x = $this->a->country('ae');
        $this->assertInstanceOf(CountriesCollectionDTO::class, $x);
    }

    public function testAirports()
    {
        $x = $this->a->airports();
        $this->assertInstanceOf(AirportsDTO::class, $x);
        $y = $this->a->airports(country: 'ae');
        $this->assertInstanceOf(AirportsDTO::class, $y);
        $this->assertEquals(10, $y->count);
        $this->assertEquals(249, $y->total);
    }

    public function testAirport()
    {
        $x = $this->a->airport('LHR');
        $this->assertInstanceOf(SingleAirportsDTO::class, $x);
    }
}