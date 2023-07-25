<?php

namespace SevenEx\DTO\DateAndTime;

final class Offset
{
    public function __construct(
        /** @var array<string> */
        readonly array $gmt,
        readonly string $utc
    ) {}

}