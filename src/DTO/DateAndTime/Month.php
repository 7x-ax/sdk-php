<?php

namespace SevenEx\DTO\DateAndTime;

final class Month
{
    public function __construct(
        readonly int $number,
        readonly string $name,
        readonly string $abbreviation,
        readonly int $days
    ) {}

}