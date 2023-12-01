<?php

namespace SevenEx\DTO\Airports;

class ContinentCollection
{
    public function __construct(
        readonly int $count,
        /** @var array<Continent> */
        readonly array $continents
    ) {}

}