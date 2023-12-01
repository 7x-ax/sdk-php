<?php

namespace SevenEx\DTO\Airports;

class Region
{
    public function __construct(
        readonly string $code,
        /** @var array<string> */
        readonly array $municipalities,
    ) {}

}