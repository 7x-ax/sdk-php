<?php

namespace SevenEx\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use SevenEx\DTO\Error;
use SevenEx\DTO\DateAndTime\DateAndTime as DateAndTimeDTO;
use SevenEx\SDK\DateAndTime;

class DateAndTimeTest extends TestCase
{
    public DateAndTime $dt;
    protected function setUp(): void
    {
        $this->dt = new DateAndTime(getenv('APIKEY'));
    }

    public function testByTimezones()
    {
        $x = $this->dt->byTimezone('Europe/London');
        $this->assertInstanceOf(DateAndTimeDTO::class, $x);
        $this->assertEquals('Europe/London', $x->timezone->name);
    }

    public function testByCoordinates()
    {
        $x = $this->dt->byCoordinates(24.5494, 45.58403);
        $this->assertInstanceOf(DateAndTimeDTO::class, $x);
        $this->assertEquals('Asia/Riyadh', $x->timezone->name);
    }

    public function testByAddress()
    {
        $x = $this->dt->byAddress('Tower Bridge, London, UK');
        $this->assertInstanceOf(DateAndTimeDTO::class, $x);
        $this->assertEquals('Europe/London', $x->timezone->name);
    }

}