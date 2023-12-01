<?php

namespace SevenEx\DTO\Airports;

class SingleAirports
{
    public function __construct(
        readonly int $count,
        /** @var array<Airport> */
        readonly array $airports
    ) {}

}