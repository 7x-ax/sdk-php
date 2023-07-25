<?php

namespace SevenEx\DTO\DateAndTime;

final class Day
{
    public function __construct(
        readonly int $ofweek,
        readonly int $ofmonth,
        readonly int $ofyear,
        readonly string $name,
        readonly string $abbreviation,
        readonly string $ordinalsuffix
    ) {}

}