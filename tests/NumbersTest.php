<?php

namespace SevenEx\Sdk\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Log\LogLevel;
use SevenEx\DTO\Error;
use SevenEx\DTO\Numbers\Arabic;
use SevenEx\DTO\Numbers\Html;
use SevenEx\SDK\Numbers;

class NumbersTest extends TestCase
{
    public Timezone $tz;
    protected function setUp(): void
    {
        $this->numbers= new Numbers(getenv('APIKEY'));

    }

    public function testArabic()
    {
        $x = $this->numbers->latinToArabic(12345);
        $this->assertInstanceOf(Arabic::class, $x);
        $this->assertEquals('١٢٣٤٥', $x->arabic);

        $x = $this->numbers->arabicToLatin('١٢٣٤٥');
        $this->assertInstanceOf(Arabic::class, $x);
        $this->assertEquals(12345, $x->latin);
    }

    public function testHtml()
    {
        $x = $this->numbers->arabicToHtml('١٢٣٤٥');
        $this->assertInstanceOf(Html::class, $x);
        $this->assertEquals('&#1633;&#1634;&#1635;&#1636;&#1637;', $x->html);
    }

}