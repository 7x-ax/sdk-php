<?php

namespace SevenEx\DTO\DateAndTime;

final class Year
{
    public function __construct(
        readonly int $number,
        readonly bool $leap
    ) {}
}