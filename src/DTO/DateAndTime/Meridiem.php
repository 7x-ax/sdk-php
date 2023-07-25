<?php

namespace SevenEx\DTO\DateAndTime;

final class Meridiem
{
    public function __construct(
        readonly string $uppercase,
        readonly string $lowercase
    ) {}

}