<?php

namespace SevenEx\DTO\DateAndTime;

final class Time
{
    public function __construct(
        readonly Hour $hour,
        readonly int $minute,
        readonly int $second,
        readonly Meridiem $meridiem,
    ) {}

}