<?php

namespace SevenEx\DTO\DateAndTime;

final class Year
{
    public function __construct(
        readonly int $year,
        readonly bool $leap
    ) {}
}