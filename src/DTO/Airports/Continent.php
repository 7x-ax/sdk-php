<?php

namespace SevenEx\DTO\Airports;

class Continent
{
    public function __construct(
        readonly string $name,
        readonly string $code,
        /** @var array<Country> */
        readonly array $countries,
    ) {}

}