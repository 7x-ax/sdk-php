<?php

namespace SevenEx\DTO\DateAndTime;

use SevenEx\DTO\Common\Coordinates;

final class DateAndTime
{
    public function __construct(
        readonly string $iso8601,
        readonly string $rfc2822,
        readonly string $rfc5322,
        readonly int $timestamp,
        readonly Day $day,
        readonly Timezone $timezone,
        readonly Time $time,
        readonly Month $month,
        readonly Week $week,
        readonly Year $year,
        readonly ?Coordinates $coordinates = null,
        readonly ?string $address = null,
    ) {}

}