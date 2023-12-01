<?php

namespace SevenEx\DTO\Airports;

class ContinentsCollection
{
    public function __construct(
        readonly int $count,
        /** @var array<Continents> */
        readonly array $continents
    ) {}

}