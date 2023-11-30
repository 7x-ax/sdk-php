<?php

namespace SevenEx\DTO\Geolocate;

class IspCountry
{
    public function __construct(
        readonly string $iso_code,
        readonly Names $names
    ) {}

}