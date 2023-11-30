<?php

namespace SevenEx\DTO\Geolocate;

class Subdivision
{
    public function __construct(
        readonly string $iso_code,
        readonly Names $names
    ) {}

}