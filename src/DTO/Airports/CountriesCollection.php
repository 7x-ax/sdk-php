<?php

namespace SevenEx\DTO\Airports;

class CountriesCollection
{
    public function __construct(
        readonly int $count,
        /** @var array<Country> */
        readonly array $countries,
    ) {}

}