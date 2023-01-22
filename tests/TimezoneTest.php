<?php

namespace x7x\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use x7x\Sdk\Timezone;

class TimezoneTest extends TestCase
{
    public Timezone $tz;
    protected function setUp(): void
    {
        $this->tz = new Timezone('', LogLevel::DEBUG);
    }

    public function testTimezoneFloat()
    {
        $x = $this->tz->get(22.2223, 33.3334);
        $this->assertIsArray($x);
        $this->assertEquals('Africa/Cairo', $x['timezones'][0]);
        $this->assertArrayHasKey('latitude', $x);
        $this->assertArrayHasKey('longitude', $x);
    }

    public function testTimezoneString()
    {
        $x = $this->tz->get('22.22', '33.33');
        $this->assertIsArray($x);
        $this->assertArrayHasKey('timezones', $x);
        $this->assertEquals('Africa/Cairo', $x['timezones'][0]);
        $this->assertArrayHasKey('latitude', $x);
        $this->assertArrayHasKey('longitude', $x);
    }

}