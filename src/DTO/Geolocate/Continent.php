<?php

namespace SevenEx\DTO\Geolocate;

class Continent
{
    public function __construct(
        readonly string $code,
        readonly Names $names
    ) {}

}