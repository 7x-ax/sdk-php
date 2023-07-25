<?php

namespace SevenEx\DTO\DateAndTime;

final class Hour
{
    public function __construct(
        readonly string $h12,
        readonly string $h24
    ) {}

}