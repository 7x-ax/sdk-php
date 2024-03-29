<?php

namespace SevenEx\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use SevenEx\DTO\Error;
use SevenEx\DTO\Timezone\Timezone as TimezoneDTO;
use SevenEx\SDK\Timezone;

class TimezoneTest extends TestCase
{
    public Timezone $tz;
    protected function setUp(): void
    {
        $this->tz = new Timezone(getenv('APIKEY'));
    }

    public function testTimezone()
    {
        $x = $this->tz->get(22.2223, 33.3334);
        $this->assertInstanceOf(TimezoneDTO::class, $x);
        $this->assertEquals('Africa/Cairo', $x->timezones[0]);
        $this->assertEquals(22.2223, $x->latitude);
        $this->assertEquals(33.3334, $x->longitude);
    }

}