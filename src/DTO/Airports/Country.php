<?php

namespace SevenEx\DTO\Airports;

class Country
{
    public function __construct(
        readonly string $code,
        readonly string $name,
        /** @var array<Region> */
        readonly array $regions,
    ) {}

}