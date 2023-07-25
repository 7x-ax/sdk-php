<?php

namespace SevenEx\DTO\DateAndTime;

final class DateAndTime
{
    public function __construct(
        readonly string $iso8601,
        readonly string $rfc2822,
        readonly string $rfc5322,
        readonly int $timestamp,
        readonly Timezone $timezone,
        readonly Time $time,
        readonly Month $month,
        readonly Week $week,
        readonly Year $year
    ) {}

}