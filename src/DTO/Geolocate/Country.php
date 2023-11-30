<?php

namespace SevenEx\DTO\Geolocate;

class Country
{
    public function __construct(
        readonly string $iso_code,
        readonly Names $names
    ) {}

}